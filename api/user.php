<?php

if (!defined('ABSPATH')) {
    include('../../../../wp-load.php');
}

function github_getUser($user)
{
    $response = array(
        "code" => 0,
        "data" => array(),
    );

    if (!isset($user)) {
        $response['code'] = -1;

        return $response;
    }

    $url = "https://api.github.com/users/" . $user;
    $userInfo = github_fetch($url);

    if (array_key_exists("message", $userInfo) || array_key_exists("documentation_url", $userInfo) || $userInfo["private"] == true) {
        $response['code'] = -1;

        return $response;
    } else {
        $userInfo['followers'] = numbericCount($userInfo['followers']);
        $userInfo['public_gists'] = numbericCount($userInfo['public_gists']);
        $userInfo['public_repos'] = numbericCount($userInfo['public_repos']);

        $response['data'] = $userInfo;

        return $response;
    }
}


if (isset($_POST['user'])) {
    $user = $_POST['user'];

    $response = github_getUser($user);

    header('Content-Type:application/json');//这个类型声明非常关键

    echo json_encode($response, true);
}

exit;


