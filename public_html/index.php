<?php
require '../bootloader.php';

$modelDrinks = new \App\Drinks\Model();

$form = [
    'title' => 'Insert Drink',
    'fields' => [
        'name' => [
            'type' => 'text',
            'label' => 'Drink name:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Pavadinimas',
                ],
            ],
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'amount_ml' => [
            'type' => 'number',
            'label' => 'Amount in ml:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Talpa',
                ],
            ],
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'abarot' => [
            'type' => 'number',
            'label' => 'Abarot:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Laipsniai',
                ],
            ],
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'image' => [
            'type' => 'url',
            'label' => 'Image URL:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Paveikslelio nuoroda',
                ],
            ],
            'validators' => [
                'validate_not_empty',
            ],
        ]
    ],
    'buttons' => [
        'insert' => [
            'type' => 'submit',
        ],
        'delete all' => [
            'type' => 'submit',
        ]
    ],
    'callbacks' => [
        'success' => 'form_success'
    ],
];

function form_success($filtered_input, &$form) {
    $modelDrinks = new \App\Drinks\Model();
    $drink = new App\Drinks\Drink($filtered_input);
    $modelDrinks->insert($drink);
}

$filtered_input = get_filtered_input($form);
$button = get_form_action();

switch ($button) {
    case 'insert':
        if (!empty($filtered_input)) {
            validate_form($filtered_input, $form);
        }
        break;
    case 'delete all':
        $modelDrinks->deleteAll();
        break;
}

$navigation = [
    'image' => 'https://buvu.co.uk/files/e/7301/na22235-png.png',
    'links' => [
        [
            'url' => '/drinks.php',
            'title' => 'Drinks',
        ],
        [
            'url' => '/register.php',
            'title' => 'Register',
        ],
        [
            'url' => '/login.php',
            'title' => 'Login',
        ],
        [
            'url' => '/logout.php',
            'title' => 'Logout',
        ]
    ]
];

//<div class="topnav">
//    <div class="logo-container">
//        <div class="logo"></div>
//    </div>
//    <a href="drinks.php">Drinks</a>
//    <a href="register.php">Register</a>
//    <a href="login.php">Login</a>
//    <a href="logout.php" class="logout">Logout</a>
//</div>
//];

//sukuriam 2 objektus is klases View:
$formView = new Core\View($form);
$navigationView = new Core\View($navigation);


$cookie = new Core\Cookie('naujas-kukis');
//$cookie->save(['verte']);
//$cookie->exists();
//var_dump($cookie->read());
//$cookie->delete();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <?php print $navigationView->render(ROOT . '/core/templates/navigation.tpl.php'); ?>
        
        <!--Require form template-->
       
            <?php print $formView->render(ROOT . '/core/templates/form.tpl.php'); ?>

        <div class="catalogue">
            <div class="wrapper">
                <?php foreach ($modelDrinks->get() as $drink): ?>
                    <div class="bottle">
                        <img src="<?php print $drink->getImage(); ?>" alt="<?php $drink->getName(); ?>">
                        <div class='name'><?php print $drink->getName(); ?></div>
                        <div class='abarot'><?php print"Laipsniai: {$drink->getAbarot()} %"; ?></div>
                        <div class='amount'><?php print "Tūris {$drink->getAmount()} ml"; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>