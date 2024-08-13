<?php 
    require_once 'Conexao.php';

    class NoticiaDAO {
        public function getNoticias() {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM noticia;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }

        public function createNoticia(NoticiaModel $noticia) {
            $conexao = (new conexao())->getConexao();

            $sql = 'INSERT INTO noticia VALUES(:id, :idAutor, :titulo, :conteudo, :imagem)';

            $stmt = $conexao->prepare($sql);

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id',  null);
            $stmt->bindValue(':idAutor', $noticia->idAutor);
            $stmt->bindValue(':titulo', $noticia->tituloNoticia);
            $stmt->bindValue(':conteudo', $noticia->conteudoNoticia);
            $stmt->bindValue(':imagem', $noticia->imagemNoticia);

            return $stmt->execute();
            

        }

        public function updateNoticia(NoticiaModel $noticia) {
            $conexao = (new conexao())->getConexao();

            $sql = "UPDATE noticia SET idAutor = :idAutor, tituloNoticia = :titulo, conteudoNoticia = :conteudo, imagemNoticia = :imagem  where idNoticia = :id";
        
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idAutor', $noticia->idAutor);
            $stmt->bindValue(':titulo', $noticia->tituloNoticia);
            $stmt->bindValue(':conteudo', $noticia->conteudoNoticia);
            $stmt->bindValue(':imagem', $noticia->imagemNoticia);
            $stmt->bindValue(':id', $noticia->idNoticia);
            
            return $stmt->execute();
            
        }
        
        public function deleteNoticia(NoticiaModel $noticia) {
            $conexao = (new conexao())->getConexao();

            $sql = 'DELETE FROM noticia WHERE  idNoticia = :id;';

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $noticia->idNoticia);

            return $stmt->execute();
        }
    }

?>

