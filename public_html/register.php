<?php
require '../bootloader.php';

if (isset($_SESSION['logged_in_user'])) {
    header('Location: index.php');
}

$form = [
    'title' => 'Registracija',
    'fields' => [
        'name' => [
            'type' => 'text',
            'label' => 'Name:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Vardas'
                ]
            ],
            'validators' => [
                'validate_not_empty'
            ]
        ],
        'email' => [
            'type' => 'text',
            'label' => 'Email:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'email@email.com'
                ]
            ],
            'validators' => [
                'validate_not_empty',
                'validate_email_unique'
            ]
        ],
        'password' => [
            'type' => 'password',
            'label' => 'New password:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'slaptažodis'
                ]
            ],
            'validators' => [
                'validate_not_empty'
            ]
        ],
        'password_repeat' => [
            'type' => 'password',
            'label' => 'Repeat password:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Pakartoti slaptažodį'
                ]
            ],
            'validators' => [
                'validate_not_empty'
            ]
        ],
    ],
    'buttons' => [
        'register' => [
            'type' => 'submit',
            'class' => 'button'
        ]
    ],
    'validators' => [
        'validate_fields_match' => [
            'password',
            'password_repeat'
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];

function form_fail($filtered_input, &$form) {
    unset($form['fields']['password']['value']);
    unset($form['fields']['password_repeat']['value']);
}

function form_success($filtered_input, $form) {
    $modelUser = new \App\Users\Model();
    $user = new App\Users\User($filtered_input);
    $modelUser->insert($user);

    header('Location: login.php');
}

$filtered_input = get_filtered_input($form);

if (!empty($filtered_input)) {
    validate_form($filtered_input, $form);
}


$navigation = [
    'image' => 'https://buvu.co.uk/files/e/7301/na22235-png.png',
    'links' => [
        [
            'url' => '/drinks.php',
            'title' => 'Drinks',
            'class' => 'btn'
        ],
        [
            'url' => '/register.php',
            'title' => 'Register',
            'class' => 'btn'
        ],
        [
            'url' => '/login.php',
            'title' => 'Login',
            'class' => 'btn'
        ],
        [
            'url' => '/logout.php',
            'title' => 'Logout',
            'class' => 'btn'
        ]
    ]
];

//sukuriam 2 objektus is klases View:
$formView = new Core\View($form);
$navigationView = new Core\View($navigation);
var_dump($navigation);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!--Require navigation-->
        <?php print $navigationView->render(ROOT . '/core/templates/navigation.tpl.php'); ?>

        <!--Require form template-->
        <?php print $formView->render(ROOT . '/core/templates/form.tpl.php'); ?>

        <div class="wrapper">
            <p>Arba <a href="login.php">prisijunk!</a></p>
        </div>
        <script src="js/app.js"></script>
    </body>
</html>