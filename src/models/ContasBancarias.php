<?php
class ContasBancarias {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function contaBancariaExiste($banco, $agencia,$numero_conta) {
        try {
            $sql = "SELECT COUNT(*) FROM contasbancarias WHERE banco = :banco AND agencia = :agencia AND numero_conta= :numero_conta";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':banco', $banco);
            $stmt->bindParam(':agencia', $agencia);
            $stmt->bindParam(':numero_conta', $numero_conta);
            $stmt->execute();
            
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function cadastrar($nome,$banco, $agencia,$numero_conta,$saldo) {

        try {
            // Verifica se o cliente já existe
            if ($this->contaBancariaExiste($banco, $agencia,$numero_conta)) {
                echo "Erro: Connta Bancária já cadastrada!";
                return false;
            }

        // Se não existir, faz o cadastro
        $sql = "INSERT INTO contasbancarias (nome_conta, banco, agencia, numero_conta, saldo)
                VALUES (:nome, :banco, :agencia, :numero_conta, :saldo)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':banco', $banco);
        $stmt->bindParam(':agencia', $agencia);
        $stmt->bindParam(':numero_conta', $numero_conta);
        $stmt->bindParam(':saldo', $saldo);


        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return false;
    }
    
    }

    public function listarContaBancaria() {
        try {
            $sql = "SELECT id_conta, nome_conta, banco, agencia, numero_conta, saldo FROM contasbancarias";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            // Retorna os resultados como um array associativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return [];
        }
    }

     // Método para buscar conta bancária por ID
     public function buscarContaBancariaPorId($id) {
        $id = intval($id);
        $stmt = $this->conn->prepare("SELECT * FROM contasbancarias WHERE id_conta = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para atualizar cliente
    public function editarContaBancaria($id, $nome,$banco, $agencia,$numero_conta,$saldo) {
        try {
            // Preparando a consulta SQL para atualização
            $stmt = $this->conn->prepare("UPDATE contasbancarias SET nome_conta = :nome, banco = :banco, agencia = :agencia, numero_conta = :numero_conta, saldo = :saldo WHERE id_conta = :id");
    
            // Bind dos parâmetros
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':banco', $banco);
            $stmt->bindParam(':agencia', $agencia);
            $stmt->bindParam(':numero_conta', $numero_conta);
            $stmt->bindParam(':saldo', $saldo);
          
            // Executando a query
            return $stmt->execute(); // Retorna true se a execução for bem-sucedida, ou false em caso de erro
        } catch (PDOException $e) {
            // Caso haja erro, capture a exceção e imprima o erro
            echo "Erro ao atualizar o conta bancária: " . $e->getMessage();
            return false;
        }
    }

    // Método para deletar cliente
    public function deletarContaBancaria($id) {
        $stmt = $this->conn->prepare("DELETE FROM contasbancarias WHERE id_conta = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function contarContaBancaria() {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM contasbancarias");
            $stmt->execute();
            
            return $stmt->fetchColumn(); // Retorna o número total de clientes
        } catch (PDOException $e) {
            echo "Erro ao contar conta bancária: " . $e->getMessage();
            return false;
        }
    }

    public function contarContaBancariaAtivos() {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM contasbancarias WHERE status = 'A'");
            $stmt->execute();
            
            return $stmt->fetchColumn(); // Retorna o número total de clientes ativos
        } catch (PDOException $e) {
            echo "Erro ao contar conta bancária ativos: " . $e->getMessage();
            return false;
        }
    }

    public function contarContaBancariaInativos() {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM contasbancarias WHERE status = 'I'");
            $stmt->execute();
            
            return $stmt->fetchColumn(); // Retorna o número total de clientes inativos
        } catch (PDOException $e) {
            echo "Erro ao contar contas bancárias inativos: " . $e->getMessage();
            return false;
        }
    }

    public function deletarContaBancariaInativos() {
        try {
            $stmt = $this->conn->prepare("DELETE FROM contasbancarias WHERE status = 'I'");
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao deletar conta bancária inativos: " . $e->getMessage();
            return false;
        }
    }
}
