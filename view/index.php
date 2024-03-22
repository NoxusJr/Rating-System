<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating System</title>
    <link rel="stylesheet" href="view/css/global.css">
    <link rel="stylesheet" href="view/css/colors.css">
    <link rel="stylesheet" href="view/css/index.css">

</head>
<body>
    <header>
        <div id="logo"></div>
        <p id="description">AAAAAAAAAAAAAAAAAAAAAAAAAAAA</p>
    </header>

    <main>
        <form action="../controller/router.php" method="post">
            <input type="hidden" name="route" id="route" value="/loginAccount">

            <input type="text" name="login" id="login">
            <div id="inputs-group">
                <input type="passwrod" name="password" id="password">
                <button id="submit-login" type="submit">-></button>
            </div>
        </form>
    </main>
</body>
</html>