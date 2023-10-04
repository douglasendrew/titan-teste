<?php

use Titan\Sistema\Controllers\ContasController;
use Titan\Sistema\Controllers\HomeController;

require __DIR__ . "/../../../vendor/autoload.php";

$routes = [
    "/Home" => [
        "type" => ["GET"],
        "function" => [HomeController::class]
    ],

    "/conta/adicionar" => [
        "type" => ["GET"],
        "function" => [ContasController::class]
    ],

    "/action/conta/adicionar" => [
        "type" => ["POST"],
        "function" => [ContasController::class, "adicionarConta"]
    ],

    "/action/conta/atualizar" => [
        "type" => ["POST"],
        "function" => [ContasController::class, "atualizarConta"]
    ],

    "/conta/excluir" => [
        "type" => ["GET"],
        "function" => [ContasController::class, "exluirConta"]
    ],

    "/conta/pagar" => [
        "type" => ["GET"],
        "function" => [ContasController::class, "pagarConta"]
    ],

    "/conta/editar" => [
        "type" => ["GET"],
        "function" => [ContasController::class, "editarConta"]
    ],

    "/conta/listagem" => [
        "type" => ["GET"],
        "function" => [ContasController::class, "listagemContas"]
    ],

    // ERRORS - Não apagar
    "/Erros/404" => [
        "type" => ["GET"]
    ],
    "/Erros/405" => [
        "type" => ["GET"]
    ],
    "/Erros/500" => [
        "type" => ["GET"]
    ],
    "/Erros/DBError" => [
        "type" => ["GET"]
    ],
];
