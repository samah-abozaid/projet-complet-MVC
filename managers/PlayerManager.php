<?php 

class PlayerManager extends AbstractManager {

    public function __construct(){
        parent::__construct();
    }
    
    public function findOne(id $id) : Player {
        
        $query = $this->db->prepare("SELECT * FROM players WHERE id = :id");
        
        $parameters = [
            "id" => $id
            ];
            
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        $player = new Player(
            $result["nickname"],
            $result["bio"],
            $result["portrait"],
            $result["team"]
            );
            
        return $player;
    
    }
    
    public function findAll(array $players) : array {
       
       
       $query = $this->db->prepare("SELECT * FROM players");
       
       $query->execute();
           
        $results = $query->FetchAll(PDO::FETCH_ASSOC);
        
        $players = [];
        
        foreach($results as $result) {
            $players[] = new Player(
                $result["nickname"],
                $result["bio"],
                $result["portrait"],
                $result["team"]
                );
        }
        
        return $players;
    }
    
}
    ?>