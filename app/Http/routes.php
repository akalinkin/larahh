<?php

$app->get('/', function () use ($app) {
    return redirect('https://laravel-hamburg.com');
});

$app->get('u/{url}', 'URLController@redirect');
$app->post('u', 'URLController@create');