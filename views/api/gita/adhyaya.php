<?php
APIController('Gita');

$sloka = new Gita;
$res['data']['name'] = "";
$res['data']['slokas'] = $sloka->getSlokas($_REQUEST['adhyaya']);


if (!empty($res['data']['slokas'])) {
    $res['status'] = '200';
    $res['message'] = 'Success';
    $res['count'] = count($res['data']['slokas']);
} else {
    $res['status'] = '500';
    //$res['message'] = mysqli_error($con);
    $res['data'] = $data[0][0];
    $res['message'] = 'Adhyaya Not Found';
}

http_response_code($res['status']);
header('Content-Type: application/json');
echo json_encode(array_reverse($res));