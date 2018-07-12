<?php

require __DIR__ . "/vendor/autoload.php";
use Goutte\Client;
    
    function getKeys(){

        $client = new Client(['headers' => [
                'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36',
                'Accept' => 'text/html, application/xhtml+xml, application/xml;q=0.9, */*;q=0.8'
            ]]);

        $crawler = $client->request('POST', 'https://qacademico.ifce.edu.br/qacademico/lib/rsa/gerador_chaves_rsa.asp?form=frmLogin&action=%2Fqacademico%2Flib%2Fvalidalogin%2Easp');
        $script = $crawler->filter('script')->last()->text();

        preg_match_all("/\"([a-zA-Z0-9_])+\"/", $script, $keys);

        $key1 = substr($keys[0][0], 1, -1);
        $key2 = substr($keys[0][1], 1, -1);
        
        $keys = array($key1, $key2);
        return $keys;

        print($key1."\n");
        print($key2."\n");
        print_r($keys);

        //    $crawler->filter('script')->each(function ($node) {
        //        print $node->text()."\n";
        //    });
    }