<?php

function requestCSRFtoken($wiki)

    {

        $parameters = array(

                            'action' => 'query',                     

                            'format'=>'json',

                            'maxlag'=>'10',

                            'smaxage'=>'0',

                            'maxage'=>'0',

                            'assert'=>'user',

                            'assertuser'=>'admin',

                            'requestid'=>'1',

                            'servedby'=>'true',

                            'curtimestamp'=>'true',

                            'responselanginfo'=>'1',

                            'origin'=>'*',

                            'uselang'=>'user',

                            'centralauthtoken'=>'123',

                            'meta'=>'tokens',

                            'type'=>'csrf'

                            );  

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $wiki);

        curl_setopt($ch, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS,  http_build_query($parameters));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_COOKIESESSION, true);

        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie-name');

        curl_setopt($ch, CURLOPT_COOKIEFILE, '/var/www/ip4.x/file/tmp');

        $answer = curl_exec($ch);

        return $answer;

    }   

    $wiki = "http://localhost/mediawiki/api.php";
    $csrftoken= requestCSRFtoken($wiki);
    echo $csrftoken;
?>