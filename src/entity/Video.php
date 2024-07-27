<?php

namespace Nicolas\Site\entity;


class Video{


public readonly string $url;

public  readonly int $id;

    function __construct(string $url,public readonly string $title){
    

        $this->seturl($url);


    }


    function seturl($url){

        if( filter_var($url,FILTER_VALIDATE_URL)===false)
        {
            throw new \InvalidArgumentException;
        }
        $this->url=$url;
    }


    public function setId(int $id){
        $this->id = $id;

    }
}