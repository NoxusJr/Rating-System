<?php
    $root = dirname(dirname(dirname(dirname(__DIR__))));
    require_once $root . "/Mvc/controller/message.php";
    require_once $root . "/Security/protect_page.php";

    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }

    protectPage("admin","/");

    $msg = readMessage();
    echo $msg;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../../css/colors.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../css/cssAdm/homeAdm.css">

    <title>Home</title>
</head>
<body>
    <header>
        <div class="elements-div" id="change-mode" onclick="toggleTheme()"></div>
        <div class="elements-div" id="logoff"></div>
    </header>

    <main>
        <div id="container-first">
            <div class="elements-div" id="about">
                <h2><?=$_SESSION['nameUser']?></h2>
                <p>cargo: admin</p>
            </div>
            <a id="a-rating" style="text-decoration:none;color:black;" href="./seeRatings.php">
                <div class="elements-div" id="rating">
                    <h2>Ver avaliações</h2>
                </div>
            </a>
        </div>


        <div id="container-second">
            <a id="a-sector" style="text-decoration:none;color:black;" href="./sectors.php">
                <div class="elements-div" id="sector">
                    <h2>Gerenciar Setores</h2>
                </div>
            </a>
            <a id="a-worker" style="text-decoration:none;color:black;" href="./workers.php">
                <div class="elements-div" id="worker">
                    <h2>Gerenciar Funcionários</h2>
                </div>
            </a>
            <a id="a-question" style="text-decoration:none;color:black;" href="./questions.php">
                <div class="elements-div" id="question">
                    <h2>Gerenciar Questões</h2>
                </div>
            </a>
        </div>
    </main>
    
    <script src="../../js/toggleTheme.js"></script>
    <script src="../../js/logoff.js"></script>
</body>
</html>