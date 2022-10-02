<?php

namespace App\Libs;

class Curl
{

    /**
     * Basic GET method implementation with curl
     * @param string $url
     * @return bool|string
     */
    public static function fetch(string $url): bool|string
    {

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $data = curl_exec($curl);

        curl_close($curl);

        return $data;
    }

}
