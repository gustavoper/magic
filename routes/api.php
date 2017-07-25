<?php

$router->map('GET', '/', function() {
    return print_r('Bem vindo ao Magic!');
});