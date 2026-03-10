<?php
class Team
{
    private int $id;
    private string $name;
    private string $description;
    private ?Media $logo;

    public function __construct(int $id,string $name,string $description,?Media $logo)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->logo = $logo;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLogo(): ?Media
    {
        return $this->logo;
    }
}