<?php

//sis psl bus vieta kur mes kreipsimes su fetchu.
//areju json encodina i stringa
$array=[
    [
        'name'=>'Cocacola',
        'amount'=>500,   
    ],
    [
        'name'=>'Fanta',
        'amount'=>1000,   
    ],
];



print json_encode($array);

