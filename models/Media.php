<?php
class Media
{
    private int $id;
    private string $url;
    private string $alt;

    public function __construct(int $id, string $url, string $alt)
    {
        $this->id = $id;
        $this->url = $url;
        $this->alt = $alt;
    }

    public function getId(): int
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
}