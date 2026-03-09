<?php

class Router
{
    public function handleRequest() : void
    {
            
        if(isset($_GET["route"])) {
            
           if($_GET["route"] === "match") {
                $ctrl = new BlogController();
                $ctrl -> match();
           
            
          } else  if($_GET["route"] === "matchs") {
            $ctrl = new BlogController();
            $ctrl->games();
        }
        
        
        } else if($_GET["route"] === "player") {
            $ctrl = new BlogController();
            $ctrl->player();
          
          
        } else if($_GET["route"] === "players") {
            $ctrl = new BlogController();
            $ctrl->players(); 
           
        } else if($_GET["route"] === "team") {
            $ctrl = new BlogController();
            $ctrl->team();   
            
        } else if($_GET["route"] === "teams") {
            $ctrl = new BlogController();
            $ctrl->teams();
          
           
            
        
    }else {
          $ctrl = new DefaultController();
               $ctrl->home();
    }
}
}