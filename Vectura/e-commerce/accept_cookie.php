<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="footer.css">
</head>
<?php

setcookie('accept_cookie', true, time() + 365 * 24 * 3600, '/', null, false, true);         //SUR 1 ANS LE COOKIE//

if (isset($_SERVER['HTTP_REFERER']) and !empty($_SERVER['HTTP_REFERER'])) {
    header('Location:' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location:/index.php');                                                      //https://www.vectura.com///
}

?>