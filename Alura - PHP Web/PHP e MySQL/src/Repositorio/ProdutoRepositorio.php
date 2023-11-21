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

    private function formarObjeto($dados)
    {
        return new Produto(
            $dados['id'],
            $dados['tipo'],
            $dados['nome'],
            $dados['descricao'],
            $dados['imagem'],
            $dados['preco']
        );
    }

    public function opcoesCafe(): array
    {
        $sqlCafe = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
        $stmt = $this->pdo->query($sqlCafe);
        $produtosCafe = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dadosCafe = array_map(
            function ($cafe) {
                return $this->formarObjeto($cafe);
            },
            $produtosCafe
        );

        return $dadosCafe;
    }

    public function opcoesAlmoco(): array
    {
        $sqlAlmoco = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
        $stmt = $this->pdo->query($sqlAlmoco);
        $produtosAlmoco = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dadosAlmoco = array_map(
            function ($almoco) {
                return $this->formarObjeto($almoco);
            },
            $produtosAlmoco
        );

        return $dadosAlmoco;
    }
}
