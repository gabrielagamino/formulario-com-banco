<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Formulário com banco</title>
    <style>
        #central {
            width: 50%;
            height: 50%;
            margin: auto;
            background-color: rgba(73, 155, 155, 0.815);
            border-radius: 10px;
            
        }
        
        label{
            display: block;
            margin-left: 10px;
            font-family: Arial, Helvetica, sans-serif;
    
        }
        input{
            margin-left: 10px;
            margin-bottom: 20px;
            display: block;
        }

        input#btn{
            margin-left: 70px;
        }

        h1{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            text-align: center;
            padding-top: 30px;
            font-size: 20px;
            display: block;
        }

        #mens, #menserro {
            color: green;
            font-weight: bold;
            margin-left: 10px;
            font-family: Arial, Helvetica, sans-serif;
        }

        #menserro {
            color: red;
        }

        p{
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            font-size: 15px;
            margin-top: 130px;
                    
        }

    </style>
</head>
<body>
    <div id="central">
        <h1>Formulário conectado com banco de dados mysql:</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }
        ?>
        <form action="processa.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Seu nome" required>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" placeholder="Seu CPF" required>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" placeholder="Seu melhor e-mail" required>
            <label for="data_nasc">Data de Nascimento:</label>
            <input type="datetime-local" name="data_nasc" id="data_nasc">

            <input id="btn" type="submit" value="Enviar">

            </form>
        <p>Criado por Gabriela Costa</p>
    </div>
    
</body>
</html>