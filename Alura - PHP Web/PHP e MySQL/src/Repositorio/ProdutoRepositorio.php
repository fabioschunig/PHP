<?php

class ProdutoRepositorio
{
    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function opcoesCafe(): array
    {
        $sqlCafe = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
        $stmt = $this->pdo->query($sqlCafe);
        $produtosCafe = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dadosCafe = array_map(
            function ($cafe) {
                return new Produto(
                    $cafe['id'],
                    $cafe['tipo'],
                    $cafe['nome'],
                    $cafe['descricao'],
                    $cafe['imagem'],
                    $cafe['preco'],
                );
            },
            $produtosCafe
        );

        return $dadosCafe;
    }
}
