<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{app_url}style/main.css">
    <link rel="stylesheet" href="{app_url}bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="{app_url}style/responsive.css">

    <link rel="stylesheet" href="{app_url}style/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="{app_url}style/owl/owl.theme.default.min.css">

    <title>{title}</title>
</head>
<body>
    <section class="popcorn">

    {if($auth_user)}
    <header>
        <div class="container-popcorn">
            <class class="logo mr-2">POPCORN|CIN</class>
            <nav>
                <a href="{app_url}home/index">INICIO</a>
                <a href="#">SÉRIES</a>
                <a href="#">FILMES</a>
                <a href="#">DOCUMENTÁRIOS</a>
            </nav>
        </div>
    </header>
    {else}
    <header>
        <div class="user_nav">
            <class class="logo ml-5">POPCORN|CIN</class>
            <nav class="mr-5">
                <a href="{app_url}usuarios/login" class=" authLinks redButton">Entrar</a>
            </nav>
        </div>
    </header>
    {endif}