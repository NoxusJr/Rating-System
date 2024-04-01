<?php
    $root = dirname(dirname(dirname(dirname(__DIR__))));
    require_once $root . "/Mvc/controller/message.php";
    require_once $root . "/Security/protect_page.php";
    require_once $root . "/Mvc/controller/middleware/middle_read.php";

    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }

    protectPage("admin","/");

    $sectors = middleGetAllSectors();
    $questions = middleGetMediaQuestions();

    
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
    <link rel="stylesheet" href="../../css/cssAdm/seeRatings.css">

    <title>Ratings</title>
</head>
<body>
    <header>
        <a href="./homeAdm.php"><div style="margin: 0; padding: 0; position: absolute; width: 32px; height: 32px; right: 88px; top: 4px; cursor: pointer; border-radius: 100%;" class="elements-div" id="back"><p class="arrow-back">&#129048;</p></div></a>
        <div class="elements-div" id="change-mode" onclick="toggleTheme()"></div>
        <div class="elements-div" id="logoff"></div>
    </header>

    <main>
        <div id="about" class="elements-div">
            <h1>Avaliações</h1>
        </div>

        <div class="elements-div" id="sectors">
            <?php foreach($sectors as $sector):?>
                <div onclick="seeInfoSector(<?=htmlspecialchars(json_encode($sector['id_sector']))?>)" class="box">
                    <p style=""><?=$sector['name']?></p>
                </div>  

                <div id="<?=$sector['id_sector']?>" class="expanded">
                    <input type="button" value="FECHAR" onclick="hideInfoSector(<?=htmlspecialchars(json_encode($sector['id_sector']))?>)">
                    <?php
                        $available = false;

                        for($i=0;$i<count($questions);$i++){

                            if ($sector['id_sector'] == $questions[$i]['id_sector']){
                                $question = $questions[$i]['question'];
                                $media = $questions[$i]['media'];
                                $available = true;
                                echo "<p class='media' style='padding:2px;background-color:#dfd7d7;text-align:left;width:80%;margin:auto;border:1px solid black;'><span style='margin-left:5px;font-weight:bolder;'>$question</span> | <span style='font-weight:bolder;color:red;'>Nota média:</span> $media</p>";
                                echo "<br>";
                            }
                        }
                        if (!$available){
                            echo "Nenhuma avalição foi feita pra este setor";
                        }
                    ?>
                </div>
            <?php endforeach?>
        </div>
    </main>
    
    <script src="../../js/toggleTheme.js"></script>
    <script src="../../js/seeRating.js"></script>
    <script src="../../js/logoff.js"></script>
</body>
</html>