<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="../controller/router.php">
        <input type="hidden" name="route" value="/login_account">
        <input type="text" name="login" id="login">
        <input type="text" name="senha" id="senha">
        <button type="submit">ENVIAR</button>
    </form>
</body>
</html>