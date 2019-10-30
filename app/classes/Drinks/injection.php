<?php

class Game {

    public $scoreGreen;
    public $scoreBlue;

    public function __construct() {
        $this->scoreGreen = 0;
        $this->scoreBlue = 0;
    }

}

class PlayerGreen {

    public function __construct($game) {
        $game->scoreGreen++;
    }

}

class PlayerBlue {

    public function __construct($game) {
        $game->scoreBlue++;
    }

}

$game = new Game();
$player_1 = new PlayerGreen($game);
$player_2 = new PlayerBlue($game);
$player_3 = new PlayerBlue($game);
var_dump($game);
