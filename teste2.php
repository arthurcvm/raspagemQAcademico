<?php
    require __DIR__ . "/vendor/autoload.php";
    use GuzzleHttp\Client;
    
    $client = new Client();
    
    $response = $client->request('POST', 'https://qacademico.ifce.edu.br/qacademico/lib/rsa/gerador_chaves_rsa.asp?form=frmLogin&action=%2Fqacademico%2Flib%2Fvalidalogin%2Easp', [
        'form_params' => [
            'Submit' => 'OK',
            'LOGIN' => '20161035000349',
            'SENHA' => 'arthurcvm',
            'TIPO_USU' => '1'
        ]
    ]);
    
    $body = $response->getBody();
    
    echo $body;