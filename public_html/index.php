<?php
require '../bootloader.php';

//$drink_1 = new App\Drinks\Drink([
//    'name' => 'Fanta',
//    'amount_ml' => 500,
//    'abarot' => 0,
//    'image' => 'https://cdn.imgbin.com/7/4/25/imgbin-fizzy-drinks-coca-cola-fanta-orange-soft-drink-diet-coke-fanta-fanta-orange-soda-can-qLPYKWnF4pk8kNLStT9Wsq0uk.jpg'
//        ]);
//
//$drink_2 = new App\Drinks\Drink([
//    'name' => 'Pepsi',
//    'amount_ml' => 750,
//    'abarot' => 0,
//    'image' => 'https://www.pinclipart.com/picdir/middle/361-3613612_pepsi-can-png-pepsi-and-coca-cola-logo.png'
//        ]);
//
//$drink_3 = new App\Drinks\Drink([
//    'name' => 'Sprite',
//    'amount_ml' => 500,
//    'abarot' => 0,
//    'image' => 'https://cdn.imgbin.com/23/10/0/imgbin-sprite-fizzy-drinks-coca-cola-fanta-beverage-can-fanta-sprite-easy-open-can-illustration-be9j6i4QyWc9apqwAvp5TY1Ad.jpg'
//        ]);
//
//$drink_4 = new App\Drinks\Drink([
//    'name' => 'CocaCola',
//    'amount_ml' => 500,
//    'abarot' => 0,
//    'image' => 'https://cdn.imgbin.com/11/25/18/imgbin-coca-cola-cherry-soft-drink-diet-coke-coca-cola-coca-cola-drinking-can-kwcz4SC8HWisRSCcJgf7wgv6h.jpg'
//        ]);
/**
 * Isirašom gėrimus į duomenų bazę
 * (Įrašius vieną kartą 'insert' eilutes užkomentuoti)
 */
$modelDrinks = new App\Drinks\Model(); // Sukuriamas modelio objektas
$drinks = $modelDrinks->get();


$user = new App\Users\User([
    'name' => 'Mano',
    'email' => 'emailas',
    'password' => 'passwordas', 
]);

var_dump($user->getData());

//var_dump($drinks);
//$modelDrinks->insert($drink_1); // Į db įrašomas pirmas gėrimas
//$modelDrinks->insert($drink_2); // Į db įrašomas antras gėrimas$modelDrinks->insert($drink_1); // Į db įrašomas pirmas gėrimas
//$modelDrinks->insert($drink_3);
//$modelDrinks->insert($drink_4);

/**
 * Paupdate'inam Pepsi butelį
 */
//$drinks = $modelDrinks->get(['name' => 'Pepsi']); // Grąžina objektų masyvą
//$my_drink = $drinks[0]; // Pasirenkam mum reikiamą
//$my_drink->setAmount(5000); // Pakeičiam jo informaciją
//$modelDrinks->update($my_drink); // Panaudojam update metodą
//\App\App::$db->createTable('test_table');

$form = [
    'attr' => [],
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
        ],
        
        
    ],
    'buttons' => [
        'insert' => [
            'type' => 'submit',
        ],
        'delete' => [
            'type' => 'submit',
        ],
    ],
    'validators' => [
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
];

function form_success($filtered_input, &$form) {
    $modelDrinks = new \App\Drinks\Model();
    var_dump($filtered_input);
    $drink = new \App\Drinks\Drink($filtered_input);
    $modelDrinks->insert($drink);
}

function form_fail($filtered_input, &$form) {
    
}

$modelDrinks = new \App\Drinks\Model();
$filtered_input = get_filtered_input($form);
$button = get_form_action();
switch ($button) {
    case 'insert':
        if (!empty($filtered_input)) {
            validate_form($filtered_input, $form);
        }
        break;
    case 'delete':
        $modelDrinks->deleteAll();
        break;
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OOP</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="form-container">
<?php require('../core/templates/form.tpl.php'); ?>
        </div>
        <div class="catalogue">
<?php foreach ($modelDrinks->get() as $drink): ?>
                <div class="bottle">
                    <img src="<?php print $drink->getImage(); ?>" alt="<?php $drink->getName(); ?>">
                    <div class='name'><?php print "Pavadinimas: {$drink->getName()}"; ?></div>
                    <div class="abarot"><?php print"Laipsniai: {$drink->getAbarot()} %"; ?></div>
                    <div class="Amount"><?php print "Tūris {$drink->getAmount()} ml"; ?></div>
                </div>
<?php endforeach; ?>
        </div>
    </body>
</html>


