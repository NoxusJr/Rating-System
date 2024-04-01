<?php
    $root = dirname(dirname(dirname(dirname(__DIR__))));
    require_once $root . "/Mvc/controller/middleware/middle_read.php";
    require_once $root . "/Mvc/controller/message.php";
    require_once $root . "/Security/protect_page.php";

    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }

    protectPage("admin","/");

    $msg = readMessage();
    echo $msg;

    $sectors = middleGetAllSectors();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../css/cssAdm/sectors.css">
    <link rel="stylesheet" href="../../css/colors.css">

    <title>Setores</title>
</head>
<body>
    <header>
        <a href="./homeAdm.php"><div style="margin: 0; padding: 0; position: absolute; width: 32px; height: 32px; right: 88px; top: 4px; cursor: pointer; border-radius: 100%;" class="elements-div" id="back"><p class="arrow-back">&#129048;</p></div></a>
        <div class="elements-div" id="change-mode" onclick="toggleTheme()"></div>
        <div class="elements-div" id="logoff"></div>
    </header>

    <main>
        <div id="container">
            <div class="elements-div" id="about">
                <h1>Setores</h1>
            </div>

            <div class="elements-div" id="create-new-sector">
                <h2>crie um novo setor</h2>
                <form action="../../../controller/router.php" method="post">
                    <input type="hidden" name="route" value="/createNewSector">
                    <input autocomplete="off" type="text" name="name" id="name" placeholder="nome do setor">
                    <button type="submit">CRIAR</button>
                </form>
            </div>
        </div>


        <div class="elements-div" id="list-sectors">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>OPÇÕES</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($sectors as $sector): ?>
                        <tr>
                            <td><?=$sector['id_sector']?></td>
                            <td><?=$sector['name']?></td>
                            <td><a class="delete" href="../../../controller/router.php/?route=/deleteSector&idSector=<?=$sector['id_sector']?>">EXCLUIR</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </main>
    
    <script src="../../js/toggleTheme.js"></script>
    <script src="../../js/logoff.js"></script>
</body>
</html>