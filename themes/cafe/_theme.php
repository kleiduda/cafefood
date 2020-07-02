<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
        <meta name="mit" content="2020-06-26T03:26:36-03:00+35667">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?= $head; ?>

    <title>CafeFood - Gerencie seus pedidos, em quanto toma um café</title>
    <link rel="icon" type="image/png" href="<?= theme("/assets/images/favicon.png");?>"/>
    <link rel="stylesheet" href="<?= theme("/assets/style.css");?>"/>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Pesquisa em andamento...</p>
    </div>
</div>

<!--HEADER-->
<header class="main_header gradient gradient-green">
    <div class="container">
        <div class="main_header_logo">
            <h1><a class="icon-coffee transition" title="Home" href="<?= url();?>">Cafe<b>Food</b></a></h1>
        </div>

        <nav class="main_header_nav">
            <span class="main_header_nav_mobile j_menu_mobile_open icon-menu icon-notext radius transition"></span>
            <div class="main_header_nav_links j_menu_mobile_tab">
                <span class="main_header_nav_mobile_close j_menu_mobile_close icon-error icon-notext transition"></span>
                <a class="link transition radius active" title="Home" href="<?= url();?>">Home</a>
                <a class="link transition radius" title="Sobre" href="<?= url("/sobre");?>">Sobre</a>
                <a class="link transition radius" title="Blog" href="<?= url("/blog");?>">Blog</a>
                <a class="link login transition radius icon-sign-in" title="Entrar" href="<?= url("/entrar");?>">Entrar</a>
            </div>
        </nav>
    </div>
</header>

<!--CONTENT-->
<main class="main_content">
    <?= $v->section("content"); ?>
</main>
<?php if($v->section("optout")): ?>
    <?= $v->section("optout");?>
<?php else: ?>
    <article class="footer_optout">
        <div class="footer_optout_content content">
            <span class="icon icon-coffee icon-notext"></span>
            <h2>Comece a gerenciar seus pedidos agora mesmo</h2>
            <p>É rápido, simples e gratuito!</p>
            <a href="<?= url("/cadastrar");?>"
               class="footer_optout_btn gradient gradient-green gradient-hover radius icon-check-square-o">Quero gerenciar</a>
        </div>
    </article>
<?php endif; ?>

<!--FOOTER-->
<footer class="main_footer">
    <div class="container content">
        <section class="main_footer_content">
            <article class="main_footer_content_item">
                <h2>Sobre:</h2>
                <p>O CaféFood é um gerenciador de pedidos simples, poderoso e gratuito. O prazer de tomar um café e
                    ter o controle total de suas vendas.</p>
                <a title="Termos de uso" href="<?= url("/termo");?>">Termos de uso</a>
            </article>

            <article class="main_footer_content_item">
                <h2>Mais:</h2>
                <a class="link transition radius active" title="Home" href="<?= url();?>">Home</a>
                <a class="link transition radius" title="Sobre" href="<?= url("sobre");?>">Sobre</a>
                <a class="link transition radius" title="Blog" href="<?= url("blog");?>">Blog</a>
                <a class="link transition radius" title="Entrar" href="<?= url("entrar");?>">Entrar</a>
            </article>

            <article class="main_footer_content_item">
                <h2>Contato:</h2>
                <p class="icon-phone"><b>Telefone:</b><br> +55 55 5555.5555</p>
                <p class="icon-envelope"><b>Email:</b><br> cafe@cafefood.com</p>
                <p class="icon-map-marker"><b>Endereço:</b><br> São Paulo, SP/Brasil</p>
            </article>

            <article class="main_footer_content_item social">
                <h2>Social:</h2>
                <a class="icon-facebook" href="https://facebook.com.br/<?= CONF_SOCIAL_FACEBOOK_PAGE ;?>">/CafeFood</a>
                <a class="icon-instagram" href="#insta" title="CafeControl no Instagram">@CafeFood</a>
                <a class="icon-youtube" href="#yt" title="CafeControl no YouTube">/CafeFood</a>
            </article>
        </section>
    </div>
</footer>

<script src="<?= theme("/assets/scripts.js");?>"></script>

</body>
</html>