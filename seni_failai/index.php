<?php
require '../functions/form/core.php';
require '../functions/html/generators.php';
require '../functions/html/file.php';

$form = [
    'attr' => [
        'action' => 'index.php',
        'class' => 'bg-black'
    ],
    'title' => 'Kalėdų norai',
    'fields' => [
        'first_name' => [
            'type' => 'text',
            'value' => '',
            'label' => 'Vardas*:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter your name',
                    'class' => 'input-text',
                    'id' => 'first-name'
                ]
            ],
//            'error' => 'Vardas per trumpas!'
            'validators' => [
                'validate_not_empty',
            ]
        ],
        'last_name' => [
            'type' => 'text',
            'value' => '',
            'label' => 'Pavardė:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter your last name',
                    'class' => 'input-text',
                    'id' => 'last-name'
                ]
            ],
//            'error' => 'Paliktas tuš�?ias laukas!'
            'validators' => [
                'validate_not_empty',
            ]
        ],
        'age' => [
            'type' => 'number',
            'label' => 'Age*:',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter your age',
                    'class' => 'input-text',
                    'id' => 'age'
                ]
            ],
//            'error' => 'Paliktas tu�?ias laukas!'
            'validators' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_is_positive',
                'validate_max_120'
            ]
        ],
        'email' => [
            'type' => 'email',
            'label' => 'Email*:',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter your email',
                    'class' => 'input-text',
                    'id' => 'email'
                ]
            ],
//            'error' => 'Paliktas tuš�?ias laukas!'
            'validators' => [
                'validate_not_empty',
                'validate_is_email'
            ]
        ],
        'wish' => [
            'type' => 'select',
            'value' => 'car', //�?ia įrašome 'option' indeksą, by default bus tas selected
            'label' => 'Kalėdom noriu:',
            'extra' => [
                'attr' => [
                    'class' => 'input-select',
                    'id' => 'wish'
                ]
            ],
            'options' => [
                'car' => 'BMW',
                'tv' => 'Teliko',
                'socks' => 'Kojinių'
            ],
            'validators' => [
                'validate_not_empty',
            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'type' => 'submit',
            'value' => 'Siųsti'
        ],
        'reset' => [
            'type' => 'reset',
            'value' => 'Išvalyti'
        ]
    ],
    'message' => 'Užpildyk formą!',
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];

function form_success($filtered_input, &$form) {
    $form['message'] = 'Success!';
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
        <title>Form Security</title>
        <link rel="stylesheet" href="../includes/style.css">
    </head>
    <body>
<?php require '../templates/form.tpl.php'; ?>
    </body>
</html>