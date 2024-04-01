<?php
    session_start();

    $root = dirname(dirname(dirname(dirname(__DIR__))));
    require_once $root."/Security/protect_page.php";	
    require_once $root."/Mvc/controller/middleware/middle_read.php";

    protectPage('funcionario','/');   

    $infos = middleGetQuestions($_SESSION['idSectorUser']);
    $sizeInfos = count($infos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Assess</title>
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../css/colors.css">
    <link rel="stylesheet" href="../../css/cssWorker/toAssess.css">
    
</head>
<body>
    <header>
        <a href="./homeWorker.php"><div style="margin: 0; padding: 0; position: absolute; width: 32px; height: 32px; right: 88px; top: 4px; cursor: pointer; border-radius: 100%;" class="elements-div" id="back"><p class="arrow-back">&#129048;</p></div></a>
        <div class="elements-div" id="change-mode" onclick="toggleTheme()"></div>
        <div class="elements-div" id="logoff"></div>
    </header>

    <main>
        <?php foreach ($infos as $info): ?>
            <div id="<?= $info['idDiv'] ?>" class="question-box elements-div">
                <input type="hidden" name="dataBaseIdQuestion" id="dataBaseIdQuestion" value="<?= $info['dataBaseIdQuestion'] ?>">

                <h2 class="title-question"><?= $info['titleQuestion'] ?></h2>

                <div class="labels">
                    <label for="<?= $info['idLinkLabel-5'] ?>">5</label>
                    <label for="<?= $info['idLinkLabel-4'] ?>">4</label>
                    <label for="<?= $info['idLinkLabel-2'] ?>">2</label>
                    <label for="<?= $info['idLinkLabel-1'] ?>">1</label>
                </div>

                <div class="inputs">
                    <input type="radio" name="<?= $info['name'] ?>" value="5" id="<?= $info['idLinkLabel-5'] ?>">
                    <input type="radio" name="<?= $info['name'] ?>" value="4" id="<?= $info['idLinkLabel-4'] ?>">
                    <input type="radio" name="<?= $info['name'] ?>" value="2" id="<?= $info['idLinkLabel-2'] ?>">
                    <input type="radio" name="<?= $info['name'] ?>" value="1" id="<?= $info['idLinkLabel-1'] ?>">
                </div>

                <input class="next-question" type="button" value="->" onclick="nextQuestion(<?= htmlspecialchars(json_encode($info['idDiv'])) ?>, <?= htmlspecialchars(json_encode($sizeInfos)) ?>)">
            </div>
        <?php endforeach; ?>
    </main>
    
    <script src="../../js/toggleTheme.js"></script>
    <script src="../../js/logoff.js"></script>
    <script src="../../js/nextQuestion.js"></script>
</body>
</html>