<?php
    require_once 'conexao.php';

    class AutorDAO {
        public function getAutores() {
            $conexao = (new  conexao())->getConexao();

            $sql = 'SELECT * FROM autor;';

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>