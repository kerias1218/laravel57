<?php

function getCurl($url)
{
    $connection = curl_init();
    curl_setopt($connection, CURLOPT_URL, $url);
    curl_setopt($connection, CURLOPT_TIMEOUT, 60);
    curl_setopt($connection, CURLOPT_POST, 0);
    curl_setopt($connection, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 4.4.2; Nexus 4 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.114 Mobile Safari/537.36');
    curl_setopt($connection, CURLOPT_REFERER, $url);
    //curl_setopt($connection, CURLOPT_POSTFIELDS, http_build_query($PostData));
    curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($connection);
    curl_close($connection);
    return $response;
}