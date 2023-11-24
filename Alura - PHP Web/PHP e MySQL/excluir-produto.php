<?php

require 'src/conexao-bd.php';
require 'src/Modelo/Produto.php';
require 'src/Repositorio/ProdutoRepositorio.php';

$produtosRepositorio = new ProdutoRepositorio($pdo);
$produtosRepositorio->deletar($_GET['id']);
