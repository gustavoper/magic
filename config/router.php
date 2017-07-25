<?php

// instância nosso objeto de roteador
$router = new AltoRouter();

// inclui as rotas criadas
include '../routes/api.php';

// verifica se alguma rota bateu, "aqui tem coragem, matadô de onça!"
$match = $router->match();

// caso ache a rota, faz a chamada da marvada
if( $match && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] ); 
} else {
    // headers de json e 404
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    header('Content-Type: application/json');
    // retorna um json de erro
    print_r(json_encode([
        'type' => 'error',
        'message' => 'endpoint not found!'
    ]));
}