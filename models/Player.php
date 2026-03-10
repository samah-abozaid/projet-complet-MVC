
<?php
class Player
{
    private int $id;
    private string $nickname;
    private string $bio;
    private ?Media $portrait;
    private ?Team $team;

    public function __construct(
        int $id,
        string $nickname,
        string $bio,
        ?Media $portrait,
        ?Team $team
    ){
        $this->id = $id;
        $this->nickname = $nickname;
        $this->bio = $bio;
        $this->portrait = $portrait;
        $this->team = $team;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getPortrait(): ?Media
    {
        return $this->portrait;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }
}