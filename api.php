<?php

class GitHubCard_REST_API
{
    /**
     * Register the REST API routes.
     */
    public static function init()
    {
        if (!function_exists('register_rest_route')) {
            // The REST API wasn't integrated into core until 4.4, and we support 4.0+ (for now).
            return false;
        }

        register_rest_route('github-card/', '/repos', array(
            array(
                'methods' => 'POST',
                'permission_callback' => array('GitHubCard_REST_API', 'privileged_permission_callback'),
                'callback' => array('GitHubCard_REST_API', 'get_user_repos'),
                'args' => array(
                    'user' => array(
                        'required' => true,
                        'type' => 'string',
                        'sanitize_callback' => 'sanitize_user',
                        'description' => 'github username',
                    ),
                ),
            ),
        ));
    }

    public static function get_user_repos($request)
    {
        $user = $request->get_param('user');

        $response = self::github_getRepos($user);

        return rest_ensure_response($response);

    }

    public static function privileged_permission_callback()
    {
        return true;
    }

    public static function sanitize_key($key, $request, $param)
    {
        return trim($key);
    }

    public static function github_getRepos($user)
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
                        "stargazers_count" => wp_github_card_number_count($item['stargazers_count']),
                        "forks" => wp_github_card_number_count($item['forks']),
                        "watchers" => wp_github_card_number_count($item['watchers']),
                        "open_issues" => $item['open_issues'],
                        "language" => $item['language'],
                    );
                }

                $response['data'] = $result;
            }

            return $response;
        }
    }
}
