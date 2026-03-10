<?php 

class GameManager extends AbstractManager {

    public function __construct(){
        parent::__construct();
    }
    
public function findLastGame(): ?Game
{
    $sql = "SELECT 
            g.id,
            g.name,
            g.date,

            t1.id AS team1_id,
            t1.name AS team1_name,

            t2.id AS team2_id,
            t2.name AS team2_name

            FROM games g

            JOIN teams t1 ON g.team_1 = t1.id
            JOIN teams t2 ON g.team_2 = t2.id

            ORDER BY g.date DESC
            LIMIT 1";

    $stmt = $this->db->query($sql);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        return null;
    }

    $team1 = new Team(
        $row['team1_id'],
        $row['team1_name'],
        "",
        null
    );

    $team2 = new Team(
        $row['team2_id'],
        $row['team2_name'],
        "",
        null
    );

    $game = new Game(
        $row['id'],
        $row['name'],
        new DateTime($row['date']),
        $team1,
        $team2,
        null
    );

    return $game;
}

}