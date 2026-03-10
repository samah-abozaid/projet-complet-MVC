<?php

class PlayerManager extends AbstractManager {

    public function __construct() {
        parent::__construct();
    }

    public function findAll(): array
    {
        $db = Database::connect();

        $sql = "SELECT p.*, 
                m.id as media_id, m.url, m.alt,
                t.id as team_id, t.name
                FROM players p
                LEFT JOIN media m ON p.portrait = m.id
                LEFT JOIN teams t ON p.team = t.id";

        $stmt = $db->query($sql);

        $players = [];

        while($row = $stmt->fetch())
        {
            $media = null;

            if($row['media_id']){
                $media = new Media(
                    $row['media_id'],
                    $row['url'],
                    $row['alt']
                );
            }

            $team = null;

            if($row['team_id']){
                $team = new Team(
                    $row['team_id'],
                    $row['name'],
                    "",
                    null
                );
            }

            $players[] = new Player(
                $row['id'],
                $row['nickname'],
                $row['bio'],
                $media,
                $team
            );
        }

        return $players;
    }
    
    
    
    public function findHomePlayers(): array
{
    $sql = "SELECT p.id, p.nickname, p.bio,
            m.id AS media_id, m.url, m.alt
            FROM players p
            LEFT JOIN media m ON p.portrait = m.id
            LIMIT 3";

    $stmt = $this->db->query($sql);

    $players = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $media = null;

        if ($row['media_id']) {
            $media = new Media(
                $row['media_id'],
                $row['url'],
                $row['alt']
            );
        }

        $player = new Player(
            $row['id'],
            $row['nickname'],
            $row['bio'],
            $media,
            null
        );

        $players[] = $player;
    }

    return $players;
}
}

