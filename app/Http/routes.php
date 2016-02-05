<?php

$app->get('/', function () use ($app) {
    return view('home');
});

$app->get('u/{url}', 'URLController@redirect');
$app->post('u', 'URLController@create');