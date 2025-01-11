<?php
class Fornecedor {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function fornecedorExiste($cnpj_cpf, $email) {
        try {
            $sql = "SELECT COUNT(*) FROM fornecedores WHERE cnpj_cpf = :cnpj_cpf OR email = :email";
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

    public function cadastrar($nome, $cnpj_cpf, $email, $telefone, $endereco, $status) {

        try {
            // Verifica se o fornecedor já existe
            if ($this->fornecedorExiste($cnpj_cpf, $email)) {
                echo "Erro: fornecedor já cadastrado!";
                return false;
            }

        // Se não existir, faz o cadastro
        $sql = "INSERT INTO fornecedores (nome_fornecedor, cnpj_cpf, email, telefone, endereco, status)
                VALUES (:nome, :cnpj_cpf, :email, :telefone, :endereco, :status)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cnpj_cpf', $cnpj_cpf);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':status', $status);

        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return false;
    }
    
    }

    public function listarFornecedores() {
        try {
            $sql = "SELECT id_fornecedor, nome_fornecedor, cnpj_cpf, email, telefone, endereco, status FROM fornecedores";
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
     public function buscarFornecedorPorId($id) {
        $id = intval($id);
        $stmt = $this->conn->prepare("SELECT * FROM fornecedores WHERE id_fornecedor = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para atualizar fornecedor
    public function editarFornecedor($id, $nome, $cnpj_cpf, $email, $telefone, $endereco, $status) {
        try {
            // Preparando a consulta SQL para atualização
            $stmt = $this->conn->prepare("UPDATE fornecedores SET nome_fornecedor = :nome, cnpj_cpf = :cnpj_cpf, email = :email, telefone = :telefone, endereco = :endereco, status = :status WHERE id_fornecedor = :id");
    
            // Bind dos parâmetros
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cnpj_cpf', $cnpj_cpf);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $id);
    
            // Executando a query
            return $stmt->execute(); // Retorna true se a execução for bem-sucedida, ou false em caso de erro
        } catch (PDOException $e) {
            // Caso haja erro, capture a exceção e imprima o erro
            echo "Erro ao atualizar o fornecedor: " . $e->getMessage();
            return false;
        }
    }

    // Método para deletar fornecedor
    public function deletarFornecedor($id) {
        $stmt = $this->conn->prepare("DELETE FROM fornecedores WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function contarFornecedores() {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM fornecedorese");
            $stmt->execute();
            
            return $stmt->fetchColumn(); // Retorna o número total de fornecedores
        } catch (PDOException $e) {
            echo "Erro ao contar fornecedores: " . $e->getMessage();
            return false;
        }
    }

    public function contarFornecedoresAtivos() {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM fornecedores WHERE status = 'A'");
            $stmt->execute();
            
            return $stmt->fetchColumn(); // Retorna o número total de fornecedores ativos
        } catch (PDOException $e) {
            echo "Erro ao contar fornecedores ativos: " . $e->getMessage();
            return false;
        }
    }

    public function contarFornecedoresInativos() {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM fornecedores WHERE status = 'I'");
            $stmt->execute();
            
            return $stmt->fetchColumn(); // Retorna o número total de fornecedores inativos
        } catch (PDOException $e) {
            echo "Erro ao contar fornecedores inativos: " . $e->getMessage();
            return false;
        }
    }

    public function deletarFornecedoresInativos() {
        try {
            $stmt = $this->conn->prepare("DELETE FROM fornecedores WHERE status = 'I'");
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao deletar fornecedores inativos: " . $e->getMessage();
            return false;
        }
    }
}
