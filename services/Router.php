<?php

class Router
{
    public function handleRequest(): void
    {
        $ctrl = new DefaultController();

        if (isset($_GET["route"])) {

            if ($_GET["route"] === "match") {
                $ctrl->match();

            } elseif ($_GET["route"] === "matchs") {
                $ctrl->games();

            } elseif ($_GET["route"] === "player") {
                $ctrl->player();

            } elseif ($_GET["route"] === "players") {
                $ctrl->players();

            } elseif ($_GET["route"] === "team") {
                $ctrl->team();

            } elseif ($_GET["route"] === "teams") {
                $ctrl->teams();

            } else {
                $ctrl->notfound();
            }

        } else {
            $ctrl->home();
        }
    }
}