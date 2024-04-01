<?php
    $root = dirname(dirname(dirname(dirname(__DIR__))));
    require_once $root . "/Mvc/controller/message.php";
    require_once $root . "/Mvc/controller/middleware/middle_read.php";
    require_once $root."/Security/protect_page.php";

    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }
    
    protectPage('funcionario','/');	

    $msg = readMessage();
    echo $msg;

    $available = middleRatingAvailable($_SESSION['idUser']);
    
    if ($available){
        $ratingText = "avaliação disponivel";
        $ratingLink = "toAssess.php";
        $ratingClass = "availableTrue";
    } else {
        $ratingText = "você só pode avaliar a cada 30 dias";
        $ratingLink = "/Mvc/view/pages/worker/homeWorker.php";
        $ratingClass = "availableFalse";
    }

    $historics = middleGetMyDateRatings($_SESSION['idUser']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../css/colors.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../css/cssWorker/homeWorker.css">

</head>
<body>
    <header>
        <div class="elements-div" id="change-mode" onclick="toggleTheme()"></div>
        <div class="elements-div" id="logoff"></div>
    </header>

    <main>
        <div class="elements-div" id="user-info">
            <h2><?=$_SESSION['nameUser']?></h2>
            <p>cargo: funcionário</p>
        </div>

        <div class="elements-div assess" id="to-assess">
            <h2>Avaliar</h2>
            <p class="<?=$ratingClass?>"><?=$ratingText?></p>
        </div>

        <div class="elements-div" id="historic">
            <h2>Histórico</h2>
            <h3>data das avaliações</h3>
            <div>
                <?php foreach($historics as $historic): ?>
                    <?php  
                        $date = $historic['date'];
                        $date = new DateTime($date);
                        $date = $date->format('d-m-Y');
                    ?>

                    <p class="p-date"><?=$date?></p>
                <?php endforeach ?>
            </div>
        </div>
    </main>
            
    <script>
        document.querySelector('.assess').addEventListener('click', function() {
            window.location.href = <?="'$ratingLink'"?>;
        }); 
    </script>

    <script src="../../js/toggleTheme.js"></script>
    <script src="../../js/logoff.js"></script>
</body>
</html>