<?php
session_start();

require 'functions/form/core.php';
require 'functions/html/generators.php';
require 'functions/file.php';

$form = [
    'title' => 'Login form',
    'fields' => [
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
                'validate_is_email',
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
        ]
    ],
    'buttons' => [
        'Login' => [
            'type' => 'submit',
            'class' => 'loginr',
        ],
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];

function validate_login($filtered_input, &$form) {
    $users_array = file_to_array('data/users.txt');
    if (!empty($users_array)) {
        foreach ($users_array as $user) {
            if (strtoupper($user['email']) === strtoupper($filtered_input['email']) && $user['password'] === $filtered_input['password']) {
                return true;
            }
        }
        $form['fields']['password']['error'] = 'Tokio naudotojo nėra!';
        return false;
    }
}

function form_success($filtered_input, &$form) {
    $users_array = file_to_array('data/users.txt');
    
    if (!empty($users_array)) {
        foreach ($users_array as $user) {
            if (strtoupper($user['email']) === strtoupper($filtered_input['email'])) {
                $_SESSION['cookie_user_name'] = $user['full_name'];
            }
        }
    }
    
    $_SESSION['cookie_email'] = $filtered_input['email'];
    $_SESSION['cookie_password'] = $filtered_input['password'];
    
    //    setcookie('cookie_email', $filtered_input['email'], time() + (86400 * 30), '/');

    header('Location: index.php');
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
        <title>Login form</title>
        <link rel="stylesheet" href="includes/style.css">
    </head>
    <body class="registracion-bg">
        <?php require 'navigation.php'; ?>
        <div class="formos-fonas">
            <div><?php require 'templates/form.tpl.php'; ?></div>>
        </div>
    </body>
</html>