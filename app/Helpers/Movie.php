<?php

namespace App\Helpers;

class Movie
{
    private static $endpoint = 'https://api.themoviedb.org/3/movie/';

    public static function get($url)
    {
        $params = array(
            'api_key' => '1942cfd501bbaf1e9024a1588e5197d4',
            'language' => 'en-US',
            'page' => 1
        );
        
        $url = self::$endpoint . $url . "?" . http_build_query($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-type: application/json'
        ]);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }
}
