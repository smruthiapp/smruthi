<?php
APIController('Gita');

$sloka = new Gita;
$res['data']['sloka'] = $sloka->getSloka($_REQUEST['adhyaya'],$_REQUEST['sloka']);


if (!empty($res['data'])) {
    $res['status'] = '200';
    $res['message'] = 'Success';
    $res['count'] = count($res['data']['sloka']);
} else {
    $res['status'] = '500';
    //$res['message'] = mysqli_error($con);
    $res['data'] = $data[0][0];
    $res['message'] = 'Sloka Not Found';
}

http_response_code($res['status']);
header('Content-Type: application/json');
echo json_encode(array_reverse($res));