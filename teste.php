<?php
    require __DIR__ . "/vendor/autoload.php";
    use Goutte\Client;
    
    $client = new Client(['headers' => [
        'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36',
        'Accept' => 'text/html, application/xhtml+xml, application/xml;q=0.9, */*;q=0.8'
    ]]);
    
    $crawler = $client->request('GET', 'https://qacademico.ifce.edu.br/qacademico/index.asp?t=1001');
//    $crawler = $client->click($crawler->selectLink('Sign in')->link());
//    $token = $crawler->filter('input')->eq(1)->extract('value')[0];
//    $form = $crawler->selectLink('Esqueci minha senha')->form();
    $form = $crawler->filter('form')->form();
    $crawler = $client->submit($form, array('LOGIN' => "20161035000349", 'SENHA' => 'arthurcvm', 'TIPO_USU' => '1'));
    $crawler->filter('body')->each(function ($node) {
        print $node->text()."\n";
    });
    
    $crawler = $client->request('GET', 'https://qacademico.ifce.edu.br/qacademico/index.asp?t=2000');
    $crawler->filter('body')->each(function ($node) {
        print $node->text()."\n";
    });