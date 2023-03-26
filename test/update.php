<?php
require("C:/xampp/htdocs/test/config.php");
require_once("C:/xampp/htdocs/test/dao/UserDataAccessObjectMySql.php");
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if($id){
    $dao = new UserDataAccessObjectMySql($pdo);
    $user = $dao->getUserById($id);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container-form">
        <a href="index.php">Voltar</a>
        <form action="actions/update_action.php" method="POST">
            <h2>Editar</h2>
    
            <?php
                if(isset($_SESSION['incorrect_credentials'])){
                    echo "<p class='error_message'>" . $_SESSION['incorrect_credentials'] . "</p>";
                }
                unset($_SESSION['incorrect_credentials']);
            ?>
            <input type="number" name="id" hidden value="<?=$user->getUserAttribute("id");?>">

            <label>Nome
                <input type="text" name="name" placeholder="Mr. Olympia"  value="<?=$user->getUserAttribute("name")?>">
            </label>

            <label>Email
                <input type="email" name="email" placeholder="example@domain.com"  value="<?=$user->getUserAttribute("email")?>">
            </label>
    
            <label>Senha
                <input type="password" name="password" placeholder="267B4&i918avaN" >
            </label>

            <button>SALVAR</button>
        </form>
    </div>
</body>
</html>