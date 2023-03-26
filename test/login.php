<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container-form">
        <form action="actions/login_action.php" method="POST">
            <h2>LOGIN</h2>
    
            <?php
                if(isset($_SESSION['incorrect_credentials'])){
                    echo "<p class='error_message'>" . $_SESSION['incorrect_credentials'] . "</p>";
                }
                unset($_SESSION['incorrect_credentials']);
            ?>

            <label>Email
                <input type="email" name="email" placeholder="example@domain.com">
            </label>
    
            <label>Senha
                <input type="password" name="password" placeholder="267B4&i918avaN">
            </label>

            <button>ENTRAR</button>
        </form>
        <p>Ainda não possui uma conta? <a href="register.php">Cadastre-se</a></p>
    </div>
</body>
</html>