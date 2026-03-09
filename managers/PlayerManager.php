<?php

class PlayerManager extends AbstractManager {

    public function __construct() {
        parent::__construct();
    }

    // Trouver un joueur par ID
    public function findOne(int $id): ?array
    {
        $sql = "
            SELECT 
                players.nickname,
                players.bio,
                media.url AS portrait_url,
                teams.name AS team_name
            FROM players
            JOIN media ON players.portrait = media.id
            JOIN teams ON players.team = teams.id
            WHERE players.id = :id
        ";

        $query = $this->db->prepare($sql);
        $query->execute(["id" => $id]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        return $result;
    }


    // Tous les joueurs
    public function findAll(): array
    {
        $sql = "
            SELECT 
                players.id AS player_id,
                players.nickname,
                media.url AS portrait_url,
                teams.name AS team_name
            FROM players
            JOIN media ON players.portrait = media.id
            JOIN teams ON players.team = teams.id
        ";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    // 3 joueurs seulement
   public function find3Players(): array
{
    $sql = "
        SELECT 
            players.nickname,
            media.url AS portrait_url,
            teams.name AS team_name
        FROM players
        JOIN media ON players.portrait = media.id
        JOIN teams ON players.team = teams.id
        LIMIT 3
    ";

    $query = $this->db->prepare($sql);
    $query->execute();

    
    $players=$query->fetchAll(PDO::FETCH_ASSOC);
    return  $players;
}

}