<?php
session_start();

require '../functions/form/core.php';
require '../functions/html/generators.php';
require '../functions/file.php';




if (empty($_SESSION)) {
    header('Location: join.php');
    exit;
}

$form = [
    'fields' => [],
    'buttons' => [
        'submit' => [
            'type' => 'submit',
            'value' => 'Kick the ball',
            'class' => 'submit_kick',
//            'disabled'=> ''
        ],
    ],
    'validators' => [
        'validate_kick',
    ],
    'callbacks' => [
        'success' => 'form_success',
//        'fail' => 'form_fail'
    ]
];

function validate_kick($filtered_input, &$form) {
    var_dump("veikia");

    $teams = file_to_array('../data/teams.txt'); // users_array - kiekvieno submit metu uzkrauna esama teams.txt reiksme, ir padaro masyvu
    var_dump($teams);
    foreach ($teams as $team) {
        foreach ($team['players'] as $player) {
            if (strtoupper($player['nickname']) === strtoupper($_SESSION['cookie_nickname'])) {
                return true;
            }
        }
    }

    $form['message'] = 'Iš kokių krūmų tu iššokai, eik registruotis!';
}

function form_success($filtered_input, &$form) { // vykdoma, jeigu forma uzpildyta teisingai
    $teams = file_to_array('../data/teams.txt'); // users_array - kiekvieno submit metu uzkrauna esama teams.txt reiksme, ir padaro masyvu

    foreach ($teams as &$team) {
        if ($team['team'] === $_SESSION['cookie_team']) {
            foreach ($team['players'] as &$player) {
//                var_dump($players);
                if ($player['nickname'] == $_SESSION['cookie_nickname']) {
                    $player['score'] ++;
                    var_dump($player['score']);
                }
            }
        }
    }
    unset($team);
    array_to_file($teams, '../data/teams.txt'); // User_array konvertuoja i .txt faila JSON formatu
    $form['message'] = "Spyris įskaitytas ({$player['score']})";
}

//var_dump(get_form_action());
//ar buvo paspaustas butent submit mygtukas, tada kvieciam validate form f-ja
if (get_form_action() == 'submit') {
    validate_form([], $form);
}

$text = 'Go for it, ' . $_SESSION['cookie_nickname'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Žaidimas. Play</title>
        <link rel="stylesheet" href="../includes/style.css">
    </head>
    <body class="bg">
        <?php require 'navigation.php';?>

        <h1 class="text"><?php print $text; ?></h1>
        <div class="laukas">
            <?php require '../templates/form.tpl.php'; ?>
        </div>
    </body>
</html>
