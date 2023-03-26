<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container-form">
        <form action="actions/register_action.php" method="POST">
            <h2>REGISTRO</h2>
    
            
            <?php
                if(isset($_SESSION['email_in_use'])){
                    echo "<p class='error_message'>" . $_SESSION['email_in_use'] . "</p>";
                }
                unset($_SESSION['email_in_use']);
            ?>

            <label>Nome
                <input type="text" name="name" placeholder="Mr. Olympia" >
            </label>
    
            <label>Email
                <input type="email" name="email" placeholder="example@domain.com" >
            </label>

            <label>Senha
                <input type="password" name="password" placeholder="267B4&i918avaN" >
            </label>
    
            <label>Confirme a senha
                <input type="password" name="password_confirm" placeholder="" >
            </label>

            <button>ENTRAR</button>
        </form>
        <p>Já possui uma conta? <a href="login.php">Entre</a></p>
    </div>
</body>
</html>