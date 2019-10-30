<?php

require '../functions/form/core.php';
require '../functions/html/generators.php';
require '../functions/file.php';

$form = [
    'attr' => [
//        'action' => 'create.php',
        'class' => 'bg-black'
    ],
    'title' => 'Žaidimas',
    'fields' => [
        'team' => [
            'type' => 'text',
            'label' => 'Team name*:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Team name',
                    'class' => 'input-text',
                ]
            ],
            'validators' => [
                'validate_not_empty',
                'validate_team'
            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'type' => 'submit',
            'value' => 'Create',
            'class' => 'submit',
//            'disabled'=> ''
        ],
    ],
    'message' => 'Užpildyk formą!',
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];

//$teams = [
//    [
//      'team_name'  => 'kazkokie',
//        'players' => [
//            [
//                'nickname' => 'killer',
//                'score' => 10
//            ],
//            [
//                'nickname' => 'thriller',
//                'score' => 10
//            ]
//        ]
//    ],
//    [
//      'team_name'  => 'nekazkokie',
//        'players' => [
//            [
//                'nickname' => 'winner',
//                'score' => 10
//            ],
//            [
//                'nickname' => 'newinner',
//                'score' => 10
//            ]
//        ]
//    ],   
//];

function validate_team($field_input, &$field) {
    //masyva is duonbazes gaunam:
    $teams = file_to_array('../data/teams.txt');

    if (!empty($teams)) {
        foreach ($teams as $value) {
            if (strtoupper($value['team']) == strtoupper($field_input)) {
                $field['error'] = 'Tokia komanda jau egzistuoja';
                return false;
            }
        }
    }
    return true;
}

function form_success($filtered_input, $form) { // vykdoma, jeigu forma uzpildyta teisingai
    $users_array = file_to_array('../data/teams.txt'); // users_array - kiekvieno submit metu uzkrauna esama teams.txt reiksme, ir padaro masyvu
    //kai kuriam komanda padarom masyva:
    $filtered_input['players'] = [];

    $users_array[] = $filtered_input; // einamuoju indeksu prideda inputus i users_array

    array_to_file($users_array, '../data/teams.txt'); // User_array konvertuoja i .txt faila JSON formatu
    //kad išstumtų kitur į join.php 
    header('Location: join.php');
}

function form_fail($filtered_input, &$form) {
    $form['message'] = 'Yra klaidų!';
}

$filtered_input = get_filtered_input($form);

if (!empty($filtered_input)) {
    $success = validate_form($filtered_input, $form);
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Žaidimas. Create</title>
        <link rel="stylesheet" type="text/css" href="../includes/style.css">
    </head>
    <body>
        <?php require 'navigation.php';?>
        <div class="laukas">
            <?php require '../templates/form.tpl.php'; ?>
        </div>
    </body>
</html>
