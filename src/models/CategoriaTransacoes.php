<?php
class CategoriaTransacoes {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function CategoriaTransacoesExiste($cnpj_cpf, $email) {
        try {
            $sql = "SELECT COUNT(*) FROM categoriastransacoes WHERE cnpj_cpf = :cnpj_cpf OR email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cnpj_cpf', $cnpj_cpf);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            // Se o número de resultados for maior que 0, o fornecedor já existe
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function cadastrar($nome, $descricao) {

        try {
            // Verifica se o fornecedor já existe
            if ($this->CategoriaTransacoesExiste($nome, $descricao)) {
                echo "Erro: fornecedor já cadastrado!";
                return false;
            }

        // Se não existir, faz o cadastro
        $sql = "INSERT INTO categoriastransacoes (nome_categoria, descricao)
                VALUES (:nome, :descricao)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);

        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return false;
    }
    
    }

    public function listarCategoriaTransacoes() {
        try {
            $sql = "SELECT id_categoria, nome_categoria, descricao FROM categoriastransacoes";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            // Retorna os resultados como um array associativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return [];
        }
    }

     // Método para buscar fornecedor por ID
     public function buscarCategoriaTransacoesPorId($id) {
        $id = intval($id);
        $stmt = $this->conn->prepare("SELECT * FROM categoriastransacoes WHERE id_categoria = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editarCategoriaTransacoes($id, $nome, $descricao) {
        try {
            $stmt = $this->conn->prepare("UPDATE categoriastransacoes SET nome_categoria = :nome, descricao = :descricao WHERE id_categoria = :id");
    
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':id', $id);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            
            echo "Erro ao atualizar o categoria de transação: " . $e->getMessage();
            return false;
        }
    }

    public function deletarCategoriaTransacoes($id) {
        $stmt = $this->conn->prepare("DELETE FROM categoriastransacoes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function contarCategoriaTransacoes() {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM fornecedores");
            $stmt->execute();
            
            return $stmt->fetchColumn(); 
        } catch (PDOException $e) {
            echo "Erro ao contar categoriastransacoes: " . $e->getMessage();
            return false;
        }
    }

    public function contarCategoriaTransacoesesAtivos() {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM categoriastransacoes WHERE status = 'A'");
            $stmt->execute();
            
            return $stmt->fetchColumn(); 
        } catch (PDOException $e) {
            echo "Erro ao contar categoriastransacoes ativos: " . $e->getMessage();
            return false;
        }
    }

    public function contarCategoriaTransacoesInativos() {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM categoriastransacoes WHERE status = 'I'");
            $stmt->execute();
            
            return $stmt->fetchColumn(); 
        } catch (PDOException $e) {
            echo "Erro ao contar categoriastransacoes inativos: " . $e->getMessage();
            return false;
        }
    }

    public function deletarCategoriaTransacoesInativos() {
        try {
            $stmt = $this->conn->prepare("DELETE FROM categoriastransacoes WHERE status = 'I'");
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao deletar categoriastransacoes inativos: " . $e->getMessage();
            return false;
        }
    }
}
