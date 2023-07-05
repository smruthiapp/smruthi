<?php
APIController('Ramayanam');

$sloka = new Ramayanam;
$res['data']['id'] = $_REQUEST['kanda'].".".$_REQUEST['sarga'];
$res['data']['name'] = "";
$res['data']['slokas'] = $sloka->getSlokas($_REQUEST['kanda'],$_REQUEST['sarga']);


if (!empty($res['data']['slokas'])) {
    $res['status'] = '200';
    $res['message'] = 'Success';
    $res['count'] = count($res['data']['slokas']);
} else {
    $res['status'] = '500';
    //$res['message'] = mysqli_error($con);
    $res['data'] = $data[0][0];
    $res['message'] = 'Sarga Not Found';
}

http_response_code($res['status']);
header('Content-Type: application/json');
echo json_encode(array_reverse($res));