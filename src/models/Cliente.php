<?php
class Cliente {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function clienteExiste($cnpj_cpf, $email) {
        try {
            $sql = "SELECT COUNT(*) FROM clientes WHERE cnpj_cpf = :cnpj_cpf OR email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cnpj_cpf', $cnpj_cpf);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            // Se o número de resultados for maior que 0, o cliente já existe
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function cadastrar($nome, $cnpj_cpf, $email, $telefone, $endereco, $status) {

        try {
            // Verifica se o cliente já existe
            if ($this->clienteExiste($cnpj_cpf, $email)) {
                echo "Erro: Cliente já cadastrado!";
                return false;
            }

        // Se não existir, faz o cadastro
        $sql = "INSERT INTO clientes (nome_cliente, cnpj_cpf, email, telefone, endereco, status)
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

    public function listarClientes() {
        try {
            $sql = "SELECT id_cliente, nome_cliente, cnpj_cpf, email, telefone, endereco, status FROM clientes";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            // Retorna os resultados como um array associativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return [];
        }
    }

     // Método para buscar cliente por ID
     public function buscarClientePorId($id) {
        $id = intval($id);
        $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE id_cliente = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para atualizar cliente
    public function editarCliente($id, $nome, $cnpj_cpf, $email, $telefone, $endereco, $status) {
        try {
            // Preparando a consulta SQL para atualização
            $stmt = $this->conn->prepare("UPDATE clientes SET nome_cliente = :nome, cnpj_cpf = :cnpj_cpf, email = :email, telefone = :telefone, endereco = :endereco, status = :status WHERE id_cliente = :id");
    
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
            echo "Erro ao atualizar o cliente: " . $e->getMessage();
            return false;
        }
    }

    // Método para deletar cliente
    public function deletarCliente($id) {
        $stmt = $this->conn->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function contarClientes() {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM clientes");
            $stmt->execute();
            
            return $stmt->fetchColumn(); // Retorna o número total de clientes
        } catch (PDOException $e) {
            echo "Erro ao contar clientes: " . $e->getMessage();
            return false;
        }
    }

    public function contarClientesAtivos() {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM clientes WHERE status = 'A'");
            $stmt->execute();
            
            return $stmt->fetchColumn(); // Retorna o número total de clientes ativos
        } catch (PDOException $e) {
            echo "Erro ao contar clientes ativos: " . $e->getMessage();
            return false;
        }
    }

    public function contarClientesInativos() {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM clientes WHERE status = 'I'");
            $stmt->execute();
            
            return $stmt->fetchColumn(); // Retorna o número total de clientes inativos
        } catch (PDOException $e) {
            echo "Erro ao contar clientes inativos: " . $e->getMessage();
            return false;
        }
    }

    public function deletarClientesInativos() {
        try {
            $stmt = $this->conn->prepare("DELETE FROM clientes WHERE status = 'I'");
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao deletar clientes inativos: " . $e->getMessage();
            return false;
        }
    }
}
