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
    
    $workers = middleGetAllWorkers();

    $sectors = middleGetAllSectors();



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/colors.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../css/cssAdm/workers.css">

    <title>Funcionarios</title>
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
                <h1>Funcionários</h1>
            </div>
            <div class="elements-div" id="create-new-worker">
                <h2>Crie um novo funcionário</h2>
                <form action="../../../controller/router.php" method="post">
                    <input type="hidden" name="route" value="/createWorkerAccount">
                    <input autocomplete="off" type="text" name="name" id="name" placeholder="nome">
                    <select name="idSector" id="idSector">
                        <option value="null">Escolha um setor</option>
                        <?php foreach($sectors as $sector):?>
                            <option value="<?=$sector['id_sector']?>"><?=$sector['name']?></option>
                        <?php endforeach?>
                    </select>
                    <button type="submit">CRIAR</button>
                </form>
            </div>
        </div>

        <div class="elements-div" id="list-workers">
            <table>
                <thead>
                    <tr>
                        <th>NOME</th>
                        <th>LOGIN</th>
                        <th>SENHA</th>
                        <th>SETOR</th>
                        <th>OPÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($workers as $worker):?>
                        <tr>
                            <td><?=$worker['name']?></td>
                            <td><?=$worker['login']?></td>
                            <td><?=$worker['password']?></td>
                            <td>
                                <?php 
                                    for ($i=0;$i<count($sectors);$i++){
                                        if ($worker['id_sector'] == $sectors[$i]['id_sector']){
                                            $nameSector = $sectors[$i]['name'];
                                        }
                                    }

                                    echo $nameSector;
                                ?>
                            </td>
                            <td><a class="delete" href="../../../controller/router.php/?route=/deleteWorkerAccount&idUser=<?=$worker['id_user']?>">EXCLUIR</a></td>
                        </tr>                        
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="../../js/toggleTheme.js"></script>
    <script src="../../js/logoff.js"></script>
</body>
</html>