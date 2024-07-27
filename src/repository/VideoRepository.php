<?php

namespace Nicolas\Site\repository;
use Nicolas\Site\entity\Video;


class VideoRepository
{

    function __construct(private \PDO $pdo)
    {

    }

    public function addvideo(Video $video):bool
    {

        $sql='INSERT INTO tbvideos(url,title) VALUES(?,?)';

        $estatements=$this->pdo->prepare($sql);
        $estatements->bindValue(1,$video->url);
        $estatements->bindValue(2,$video->title);
        $result= $estatements->execute();
        $id=$this->pdo->lastInsertId();
        $video->setId(intval($id));
        return $result;
    }

   
    public function removeVideo(int $id):bool
    {

        $sql='DELETE FROM tbvideos WHERE id= ?';

        $statements=$this->pdo->prepare($sql);
        $statements->bindValue(1,$id);

        return $statements->execute();
            
    }
    public function update(Video $video):bool
    {


        $sql='UPDATE tbvideos SET url=:url, title=:title WHERE id= :id;';

        $statements=$this->pdo->prepare($sql);
        $statements->bindValue(':url',$video->url);
        $statements->bindValue(':title',$video->title);
        $statements->bindValue(':id',$video->id,\PDO::PARAM_INT);
        return $statements->execute();


    }



/**
 * @return Video[]
 */
public function all(): array
{

         $videoList = $this->pdo
             ->query('SELECT * FROM tbvideos;')
       ->fetchAll(\PDO::FETCH_ASSOC);
    return array_map(
                function (array $videoData) {
           $video = new Video($videoData['url'], $videoData['title']);
                       $video->setId($videoData['id']);

                    return $video;
    }, 
            $videoList

        );
}




//  /**
//   * Summary of all
//   * @return video[]
//   */
//  public function all():array
//  {
//      $videolist= $this->pdo->query('SELECT * FROM tbvideos;')->fetchAll(\PDO::FETCH_ASSOC);
     
//      return array_map(function(array $videodata)
//      {
//          $video=new Video($videodata['url'],$videodata['title']);
//          $video->setId($videodata['id']);
//          return $video;

//         },
//         $videolist);

//      }




}
























