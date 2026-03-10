<?php
class TeamManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

   public function findLastTeams(int $limit = 2): array
{
    $sql = "SELECT t.id, t.name, t.description,
            m.id AS media_id, m.url, m.alt
            FROM teams t
            LEFT JOIN media m ON t.logo = m.id
            ORDER BY t.id DESC
            LIMIT :limit";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();

    $teams = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $media = null;

        if ($row['media_id']) {
            $media = new Media(
                $row['media_id'],
                $row['url'],
                $row['alt']
            );
        }

        $teams[] = new Team(
            $row['id'],
            $row['name'],
            $row['description'],
            $media
        );
    }

    return $teams;
}
}