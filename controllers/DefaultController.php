<?php

class DefaultController extends AbstractController
{


 function home(): void
{
    $manager = new PlayerManager();
    $players = $manager->findHomePlayers();

    $teamManager = new TeamManager();
    $teams = $teamManager->findLastTeams(2);

    // On inclut $teams dans le rendu
    $this->render("home", [
        "players" => $players,
        "teams" => $teams
    ]);
}
    
    
    public function match() : void {
        
    }
    
    public function matchs() : void {
        
    }
    
    public function player() : void {
        
    }
    
    public function players() : void {
        
    }
    
    public function team() : void {
        
    }
    
    public function teams() : void {
        
    }
    
    public function notfound() : void {
        
    }
    
    
    
}