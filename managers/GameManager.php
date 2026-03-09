<?php 

class GameManager extends AbstractManager {

    public function __construct(){
        parent::__construct();
    }
    
    public function findOne(id $id) : Game {
        
        $query = $this->db->prepare("SELECT 
        t1.name AS team1,
        t2.name AS team2,
        g.datetime,
        g.winner
         FROM games g
        JOIN teams t1 ON g.team_1 = t1.id
        JOIN teams t2 ON g.team_2 = t2.id
        WHERE g.id = :id");
        
        $parameters = [
            "id" => $id
            ];
            
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        $game = new Player(
            $result["name"],
            $result["datetime"],
            $result["team_1"],
            $result["team_2"],
            $result["winner"]
            );
            
        return $game;
    
    }
    
    //*************************
    //***********************
    
    public function findAll(array $teams) : array {
       
       
       $query = $this->db->prepare("SELECT 
    g.id,
    t1.name AS team1,
    t2.name AS team2,
    tw.name AS winner,
    g.datetime
    FROM games g
    JOIN teams t1 ON g.team_1 = t1.id
    JOIN teams t2 ON g.team_2 = t2.id");
       
       $query->execute();
           
        $results = $query->FetchAll(PDO::FETCH_ASSOC);
        
        $teams = [];
        
        foreach($results as $result) {
            $games[] = new Game(
            $result["name"],
            $result["datetime"],
            $result["team_1"],
            $result["team_2"],
            $result["winner"]
            );
        }
        
        return $games;
    }
    
}
    ?>