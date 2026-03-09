<?php

class Media
{
    private ?int $id = null;

    public function __construct(
        private string $url,
        private string $alt
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getAlt(): string
    {
        return $this->alt;
    }
    
    public function setId(int $id){
        $this->id = $id;
    }
    
    public function setUrl(string $url){
        
        $this->url = $url;
    }
    
    public function setAlt(string $alt){
        $this->alt = $alt;
    }
}