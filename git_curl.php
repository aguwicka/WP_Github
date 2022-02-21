<?php

function get_json() {
    $user  =   get_option('git_user');
    $url = 'https://api.github.com/users/' . $user .'/repos';
    $cInit = curl_init();
    curl_setopt($cInit, CURLOPT_URL, $url);
    curl_setopt($cInit, CURLOPT_RETURNTRANSFER, 1); // 1 = TRUE
    curl_setopt($cInit, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($cInit, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    $output = curl_exec($cInit);

    $info = curl_getinfo($cInit, CURLINFO_HTTP_CODE);
    $result = json_decode($output);

    curl_close($cInit);
    return $result;
}