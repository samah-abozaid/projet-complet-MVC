<?php

class DefaultController extends AbstractController
{

    public function home() : void {
        $route = "home";
        
    
        $manager = new PlayerManager();
        $players = $manager->find3Players();
        
        $this->render("home"->["players" => $players]);
    }
        
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