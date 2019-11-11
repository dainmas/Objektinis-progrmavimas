<?php

require '../../../bootloader.php';

$model = new App\Drinks\Model();

$drinks = $model->get();
$response = [
'status' => '',
 'data' => []
];
if(is_array($drinks)){
foreach($drinks as $drink){
$response['data'][] = $drink->getData();
}
$response['status'] = 'success';
}else{
$response['status'] = 'fail';
}

print json_encode($response);






