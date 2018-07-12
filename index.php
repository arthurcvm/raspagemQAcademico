<?php
    require __DIR__ . "/vendor/autoload.php";
    use Goutte\Client;
    
    $client = new Client();
    
    $crawler = $client->request('GET', 'https://github.com/');
    $crawler = $client->click($crawler->selectLink('Sign in')->link());
    $token = $crawler->filter('input')->eq(1)->extract('value')[0];
    $form = $crawler->selectButton('Sign in')->form();
    $crawler = $client->submit($form, array('authenticity_token' => "$token", 'login' => 'arthurcvm', 'password' => 'arthur007pb'));
    $crawler->filter('.account-switcher-truncate-override')->each(function ($node) { //Get the username
        print $node->text()."\n";
    });