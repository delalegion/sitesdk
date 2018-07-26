<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

    use App\Core\Messages\FlashBag;

    $flash = new FlashBag();

    if ( isset($_SESSION['flash_messages']['error']) )
    {
        $data = explode(',', $flash->display('error'));

        foreach ($data as $value)
        {
            echo '<div class="error">' . $value . '</div>';
        }
    }


?>
    <form action="login" method="POST">
        <input type="text" class="email" name="email" placeholder="Podaj email">
        <input type="password" class="password" name="password" placeholder="Podaj hasło">
        <input type="submit" class="submit" name="submit">
        <input type="hidden" class="key" name="key" value="<?php echo substr(md5(openssl_random_pseudo_bytes(20)),-32); ?>"
    </form>
</body>
</html>