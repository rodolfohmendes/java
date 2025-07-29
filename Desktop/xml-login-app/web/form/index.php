<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xml_data = file_get_contents('php://input');
    $xml = simplexml_load_string($xml_data, "SimpleXMLElement", LIBXML_NOCDATA);
    $json = json_encode($xml);
    $data = json_decode($json, true);

    $payload = json_encode([
        'username' => $data['username'],
        'password' => $data['password']
    ]);

    $ch = curl_init('http://backend:8000/login');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    $response = curl_exec($ch);
    curl_close($ch);

    header('Content-Type: application/json');
    echo $response;
    exit;
}
?>
<form method="post">
  <input name="username" placeholder="username" />
  <input name="password" placeholder="password" />
  <input type="submit" />
</form>
