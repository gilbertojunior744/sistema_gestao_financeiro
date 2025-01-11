<?php
require_once 'classes/Database.php';
require_once 'classes/Usuario.php';
require_once 'classes/Validator.php'; // Inclua a classe de validação
include("includes/header.php");

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row mx-0">
                <div class="col-12 col-md-4">
                    <h5 class="card-title fw-semibold mb-4">Novo Cliente</h5>
                </div>
                <div class="col-12 offset-md-4 col-md-4">
                    <a href="CLIENTES_dados.php" class="btn btn-success" title="Listade Clientes">
                        <img src="assets/icons/list-search.svg" alt="Lista de Clientes">
                    </a>
                </div>
            </div>
            <br><br>
            <div class="card">
                <div class="card-body">
                    <form>

                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // Recebe os dados do formulário
                            $nome = $_POST['nome'];
                            $cnpj_cpf = $_POST['cnpj_cpf'];
                            $email = $_POST['email'];
                            $telefone = $_POST['telefone'];
                            $endereco = $_POST['endereco'];
                            $status = $_POST['status'];

                            // Validação dos campos
                            $errors = [];

                            // Validar os campos
                            if ($error = Validator::validateRequired('Nome', $nome)) {
                                $errors[] = $error;
                            }
                            if ($error = Validator::validateRequired('CNPJ ou CPF', $cnpj_cpf)) {
                                $errors[] = $error;
                            }
                            if ($error = Validator::validateRequired('E-mail', $email)) {
                                $errors[] = $error;
                            }
                            if ($error = Validator::validateEmail($email)) {
                                $errors[] = $error;
                            }
                            if ($error = Validator::validateRequired('Telefone', $telefone)) {
                                $errors[] = $error;
                            }
                            if ($error = Validator::validateTelefone($telefone)) {
                                $errors[] = $error;
                            }
                            if ($error = Validator::validateRequired('Endereço', $endereco)) {
                                $errors[] = $error;
                            }
                            if ($error = Validator::validateStatus($status)) {
                                $errors[] = $error;
                            }

                            // Se houver erros, exibe-os
                            if (count($errors) > 0) {
                                foreach ($errors as $error) {
                                    echo "<p class='text-danger'>$error</p>";
                                }
                            } else {
                                // Se não houver erros, processa o cadastro no banco de dados

                                // Conexão com o banco de dados
                                $database = new Database();
                                $db = $database->connect();

                                // Instância da classe Usuario
                                $cliente = new Cliente($db);

                                // Cadastro no banco de dados
                                if ($cliente->cadastrar($nome, $cnpj_cpf, $email, $telefone, $endereco, $status)) {
                                    echo "<p class='text-success'>Usuário cadastrado com sucesso!</p>";
                                } else {
                                    echo "<p class='text-danger'>Erro ao cadastrar usuário.</p>";
                                }
                            }
                        }
                        ?>
                        <div class="row">
                            <div class="mb-3 col-12 col-md-6">
                                <label for="nome" class="form-label">Nome </label>
                                <input type="nome" class="form-control" id="nome" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="cnpj_cpf" class="form-label">CNPJ ou CPF</label>
                                <input type="email" class="form-control" id="cnpj_cpf" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="exampleInputPassword1" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Selecione uma opção</option>
                                    <option value="A">Ativo</option>
                                    <option value="I">Inativo</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include("includes/footer.php");

?>