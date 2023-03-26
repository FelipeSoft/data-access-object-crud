<?php
session_start();

require("C:/xampp/htdocs/test/config.php");
require_once("C:/xampp/htdocs/test/dao/UserDataAccessObjectMySql.php");
require_once("C:/xampp/htdocs/test/models/User.php");

if(!isset($_SESSION['user'])){
    header("Location:http://localhost/test/login.php");
    exit;
}

$dao = new UserDataAccessObjectMySql($pdo);
$users = $dao->all();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <div class="max-width">
            <p>
                <?php
                if(isset($_SESSION['user'])){
                    echo "<p>Olá, " . $_SESSION['user'] . "</p>";
                }
                ?>
            </p>
            <button><a href="actions/logout_action.php">Sair</a></button>
        </div>
    </header>
    <div class="container">
        <div class="max-width">
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Email</td>
                        <td>Senha</td>
                        <td>Ações</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if($users !== null): ?>
                        <?php foreach($users as $user): ?>
                            <tr>
                                <td><?= $user[0]->getUserAttribute("id"); ?></td>
                                <td><?= $user[0]->getUserAttribute("name"); ?></td>
                                <td><?= $user[0]->getUserAttribute("email"); ?></td>
                                <td><?= $user[0]->getUserAttribute("password"); ?></td>
                                <td>
                                    <a href="update.php?id=<?=$user[0]->getUserAttribute("id");?>">Editar</a>
                                    <a href="actions/delete_action.php?id=<?=$user[0]->getUserAttribute("id");?>" onclick="return confirm('Deseja realmente excluir esse registro?')">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>