<?php

function github_fetch($url)
{
    $token = get_option('wp_github_card_github_token');

    $header = array(
        'Authorization' => 'token ' . $token,
        'User-Agent' => WP_GITHUB_CARD_USERAGENT
    );

    if ($token) {
        $header["Authorization"] = 'token ' . $token;
    }

    $args = array(
        'headers' => $header
    );

    $response = wp_remote_get($url, $args);

    return json_decode(wp_remote_retrieve_body($response), true);
}

function wp_github_card_render($template, $pattern, $data)
{
    static $cache = array();

    $string = $$cache[$template];

    if (is_null($string)) {
        $handle = fopen($template, "r");
        $string = fread($handle, filesize($template));
        fclose($handle);

        $cache[$template] = $string;
    }

    $replacer = function ($matches) use ($data) {
        return $data[$matches[1]];
    };
    return preg_replace_callback($pattern, $replacer, $string);
}

function wp_github_card_number_count($num)
{
    if ($num === 1000) {
        return '1k';
    }

    if ($num < 1000) {
        return $num;
    }

    $num = $num / 1000;

    return round($num, 2) . 'k';
}

?>
