<?php 

class PlayerManager extends AbstractManager {

    public function __construct(){
        parent::__construct();
    }
    
   public function findOne(int $id): ?array
{
    $sql = "
        SELECT 
            players.nickname AS nickname,
            players.bio AS bio;
            media.url AS portrait_url,
            teams.name AS team_name
        FROM players
        JOIN media ON players.portrait = media.id
        JOIN teams ON players.team = teams.id
        WHERE players.id = :id";

    $query = $this->db->prepare($sql);
    $query->execute(["id" => $id]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        return null; // joueur non trouvé
    }
$player = new Player( $result["nickname"],
                    $result["bio"],
        $result["portrait_url"],
        $result["team_name"]);
        return $player;
   
}
    //******************
    //****************
    
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
             JOIN teams ON players.team = teams.id";

    $query = $this->db->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    $players = [];

    foreach ($results as $row) {
        $players[] = [
            "id" => $row["player_id"],
            "nickname" => $row["nickname"],
            "portrait_url" => $row["portrait_url"],
            "team_name" => $row["team_name"]
        ];
    }

    return $players;
}

    public function find3Players(array $players) : array {
        
        $query = $this->db->prepare("SELECT 
            players.id AS player_id,
            players.nickname,
            media.url AS portrait_url,
            teams.name AS team_name
            FROM players
             JOIN media ON players.portrait = media.id
             JOIN teams ON players.team = teams.id");
                                    
        $query->execute();
        
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $players = [];
        
        for(int $i = 0; $i <= 2; $i++) {
            $players[] = new Player (
            "id" => $result["player_id"],
            "nickname" => $result["nickname"],
            "portrait_url" => $result["portrait_url"],
            "team_name" => $result["team_name"]
            );
        }
        
        return $players,
        
    } 
    
    
}
    ?>