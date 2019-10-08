<?php

if (!defined('ABSPATH')) {
    include('../../../../wp-load.php');
}

function github_getRepos($user)
{
    $response = array(
        "code" => 0,
        "data" => array()
    );

    if (!isset($user)) {
        $response['code'] = -1;

        return $response;
    }

    $url = "https://api.github.com/users/" . $user . "/repos";
    $repoList = github_fetch($url);

    if (array_key_exists("message", $repoList) || array_key_exists("documentation_url", $repoList) || $repoList["private"] == true) {
        $response['code'] = -1;

        return $response;
    } else {
        if (count($repoList) > 0) {
            $result = array();

            foreach ($repoList as $item) {
                $description_empty = ($item["description"] == "");
                $homepage_empty = ($item["homepage"] == "" || $item["homepage"] == null);

                $result[] = array(
                    "name" => $item['name'],
                    "full_name" => $item['full_name'],
                    "html_url" => $item['html_url'],
                    "default_branch" => $item['default_branch'],
                    "description" => ($description_empty && $homepage_empty) ? "This repository doesn't have description or homepage." : $item["description"],
                    "homepage" => $item['homepage'],
                    "stargazers_count" => numbericCount($item['stargazers_count']),
                    "forks" => numbericCount($item['forks']),
                    "watchers" => numbericCount($item['watchers']),
                    "open_issues" => $item['open_issues'],
                    "language" => $item['language'],
                );
            }

            $response['data'] = $result;
        }

        return $response;
    }
}


if (isset($_POST['user'])) {
    $user = $_POST['user'];

    $response = github_getRepos($user);

    header('Content-Type:application/json');//这个类型声明非常关键

    echo json_encode($response, true);
}

exit;


