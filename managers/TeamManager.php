<?php 

class PlayerManager extends AbstractManager {

    public function __construct(){
        parent::__construct();
    }

  public function findOne(id $id) : Team {
        
        $query = $this->db->prepare("SELECT *,
                                     m.url AS logo_url
                                    FROM teams t
                                    JOIN media m ON m.id = t.logo
                                    WHERE t.id = :id");
        
        $parameters = [
            "id" => $id
            ];
            
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        $team = new Team(
            $result["name"],
            $result["description"],
            $result["logo_url"]
            );
            
        return $team;
    
    }
    
    //***************************************
    //***************************************
    
    public function findAll(array $teams) : array {
       
       
       $query = $this->db->prepare("SELECT *,
                                     m.url AS logo_url
                                    FROM teams t
                                    JOIN media m ON m.id = t.logo");
       
       $query->execute();
           
        $results = $query->FetchAll(PDO::FETCH_ASSOC);
        
        $teams = [];
        
        foreach($results as $result) {
            $teams[] = new Team(
             $result["name"],
            $result["description"],
            $result["logo_url"]
            );
        }
        
        return $teams;
    }
    
    // public function findFourTeams(array $teams) : array {
        
    //     $query = $this->db->prepare("SELECT *,
    //                                  m.url AS logo_url
    //                                 FROM teams t
    //                                 JOIN media m ON m.id = t.logo");
                                    
    //     $query->execute();
        
    //     $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
    //     $teams = [];
        
    //     for(int $i = 0; $id <= 3; $i++) {
    //         $teams[] = new Team(
    //         $result["name"],
    //         $result["description"],
    //         $result["logo_url"]
    //         );
    //     }
        
    //     return $teams,
        
    // } 
    
    }
 

?>