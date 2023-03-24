<?php

    session_start();

    include_once("conexao.php");

    $nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $cpf = filter_input (INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $data_nasc = filter_input (INPUT_POST, 'data_nasc', FILTER_SANITIZE_STRING);

    echo "Nome: $nome\n";
    echo "CPF: $cpf\n";
    echo "E-mail $email\n";
    echo "Data de nascimento: $data_nasc";

   /* Jeito simples de envio dos dados para o banco:
   
   $result_usuarios = "INSERT INTO usuários (nome, cpf, email, data_nasc, created) VALUES('$nome', '$cpf', '$email', '$data_nasc', NOW())"; 
   
   $resultado_usuarios = mysqli_query($conn, $result_usuarios)
   
   Envio dos dados utilizando prepare e execute para evitar SQL injection*/


    $stmt = $conn->prepare("INSERT INTO 
							usuários(nome, cpf, email, data_nasc)
							VALUES (?, ?, ?, ?)
						");

    $resultSet = $stmt->execute([$_REQUEST['nome'], $_REQUEST['cpf'], $_REQUEST['email'], $_REQUEST['data_nasc']]);


    if (mysqli_insert_id($conn)){
        $_SESSION['msg'] = "<p id='mens'>Cadastrado com sucesso!</p>";
        header ("Location: index.php");
    } else {
        $_SESSION['msg'] = "<p id='menserro'>Não foi possível realizar o cadastro!</p>";
        header ("Location: index.php");
        
    }

