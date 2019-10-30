<?php
require 'functions/form/core.php';
require 'functions/html/generators.php';
require 'functions/file.php';

$form = [
    'attr' => [
//        'action' => 'index.php',
        'class' => 'bg-black'
    ],
    'title' => 'Registracijos forma',
    'fields' => [
        'full_name' => [
            'type' => 'text',
            'value' => '',
            'label' => 'Vardas*:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter your name',
                    'class' => 'input-text',
                    'id' => 'full_name'
                ]
            ],

            'validators' => [
                'validate_not_empty',
            ]
        ],
        'email' => [
            'type' => 'text',
            'value' => '',
            'label' => 'Email*:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter email',
                    'class' => 'input-text',
                    'id' => 'email'
                ]
            ],

            'validators' => [
                'validate_not_empty',
//                'validate_is_email',
//                'validate_email_unique'
            ]
        ],
        'password' => [
            'type' => 'password',
            'label' => 'Password*:',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter your password',
                    'class' => 'input-text',
                    'id' => 'password'
                ]
            ],

            'validators' => [
                'validate_not_empty',
                'validate_password', //8 ženklai
            ]
        ],
        'password_repeat' => [
            'type' => 'password',
            'label' => 'Repeat password*:',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Repeat your password',
                    'class' => 'input-text',
                    'id' => 'password_repeat'
                ]
            ],

            'validators' => [
                'validate_not_empty',
            ]
        ],
    ],
    'buttons' => [
        'Registruokis' => [
            'type' => 'submit',
            'value' => 'Registruokis',
            'class' => 'Registruokis',
        ],
    ],
    'validators' => [
        'validate_fields_match' => [
            'password', //$params
            'password_repeat' //
        ],
    ],
    'message' => 'Užpildyk formą!',
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];

function form_success($filtered_input, &$form) {
    $form['message'] = 'Success!';

    $users_array = file_to_array('data/users.txt');
    $filtered_input['users'] = [];
    $users_array[] = $filtered_input;
    array_to_file($users_array, 'data/users.txt');
    header('Location: login.php');
   
}

function form_fail($filtered_input, &$form) {
    $form['message'] = 'Yra klaidų!';
}

$filtered_input = get_filtered_input($form);

if (!empty($filtered_input)) {
    validate_form($filtered_input, $form);
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Registration</title>
        <link rel="stylesheet" href="includes/style.css">
    </head>
    <body class="registracion-bg">
         <?php require 'navigation.php';?>
        <div class="formos-fonas">
            <div><?php require 'templates/form.tpl.php'; ?></div>>
        </div>
    </body>
</html>