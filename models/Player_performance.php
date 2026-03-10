<?php
class PlayerPerformance
{
    private int $id;
    private Player $player;
    private Game $game;
    private int $points;
    private int $assists;

    public function __construct(
        int $id,
        Player $player,
        Game $game,
        int $points,
        int $assists
    ){
        $this->id = $id;
        $this->player = $player;
        $this->game = $game;
        $this->points = $points;
        $this->assists = $assists;
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function getAssists(): int
    {
        return $this->assists;
    }
}