<?php

class Game
{
    private ?int $id = null;

    public function __construct(
        private string $name,
        private Team $team_1,
        private Team $team_2,
        private ?Team $winner,
        private DateTime $datetime
    ) {}

    // Getter et Setter pour id
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    // Getter et Setter pour name
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    // Getter et Setter pour team_1
    public function getTeam1(): Team
    {
        return $this->team_1;
    }

    public function setTeam1(Team $team_1): void
    {
        $this->team_1 = $team_1;
    }

    // Getter et Setter pour team_2
    public function getTeam2(): Team
    {
        return $this->team_2;
    }

    public function setTeam2(Team $team_2): void
    {
        $this->team_2 = $team_2;
    }

    // Getter et Setter pour winner
    public function getWinner(): ?Team
    {
        return $this->winner;
    }

    public function setWinner(?Team $winner): void
    {
        $this->winner = $winner;
    }

    // Getter et Setter pour datetime
    public function getDatetime(): DateTime
    {
        return $this->datetime;
    }

    public function setDatetime(DateTime $datetime): void
    {
        $this->datetime = $datetime;
    }
}

?>