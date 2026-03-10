<?php
class Game
{
    private int $id;
    private string $name;
    private DateTime $date;
    private Team $team1;
    private Team $team2;
    private ?Team $winner;

    public function __construct(
        int $id,
        string $name,
        DateTime $date,
        Team $team1,
        Team $team2,
        ?Team $winner
    ){
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->team1 = $team1;
        $this->team2 = $team2;
        $this->winner = $winner;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTeam1(): Team
    {
        return $this->team1;
    }

    public function getTeam2(): Team
    {
        return $this->team2;
    }
}