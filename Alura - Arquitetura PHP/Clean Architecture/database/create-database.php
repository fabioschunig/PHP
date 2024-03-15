<?php

$databasePath = __DIR__ . '/database.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

echo "Conectado ao SQLite" . PHP_EOL;

// ALUNOS
$tableAlunos = '
    CREATE TABLE IF NOT EXISTS alunos (
        cpf TEXT PRIMARY KEY,
        nome TEXT,
        email TEXT
    );
';

echo "Criando tabela de ALUNOS..." . PHP_EOL;
$pdo->exec($tableAlunos);

// TELEFONES
$tableTelefones = '
    CREATE TABLE IF NOT EXISTS telefones (
        ddd TEXT,
        numero TEXT,
        cpf_aluno TEXT,
        PRIMARY KEY (ddd, numero),
        FOREIGN KEY (cpf_aluno) references alunos (cpf)
    );
';

echo "Criando tabela de TELEFONES..." . PHP_EOL;
$pdo->exec($tableTelefones);

// INDICACOES
$tableIndicacoes = '
    CREATE TABLE IF NOT EXISTS indicacoes (
        cpf_indicante TEXT,
        cpf_indicado TEXT,
        data_indicacao TEXT,
        PRIMARY KEY (cpf_indicante, cpf_indicado),
        FOREIGN KEY (cpf_indicante) references alunos (cpf),
        FOREIGN KEY (cpf_indicado) references alunos (cpf)
    );
';

echo "Criando tabela INDICACOES..." . PHP_EOL;
$pdo->exec($tableTelefones);
