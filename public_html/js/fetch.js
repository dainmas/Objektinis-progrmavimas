'use strict';

console.log('prisijunge');

//fetch('api.php')
////grizta kaip returnintas
//        .then(response=>response.json())
//        .then(data=>console.log(data));

//fetch('login.php')
//        .then(response=>response.text());

//pamatem F12- Network logina

//fetchas jasona iveda i url koda ir gauna

//kad suformuotume duomenis yra tam skirtas objektas FormData
//const formData = new FormData();
////appendinom po viena elementa key ir value
//formData.append('name', 'Kisielius');
//formData.append('amount_ml', '500');
//formData.append('abarot', '10');
//formData.append('image', 'http://www.mainyk.lt/img/items/90/73/34/4cf2a5242c174.jpg');
//formData.append('action', 'insert');
//
//
//console.log(formData);
//kiekviena karta refreso metu pasikraus:
//kiekviena kart paspaudus atsiras kisielius
//fetch('index.php', {
//    method:'POST',
//    body:formData
//})
//        .then(response=>response.text());


fetch('api/drinks/get.php')
        .then(response => response.json())
        .then(data => console.log(data));