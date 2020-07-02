<?php $v->layout("_theme");?>
<!--FEATURED-->
<article class="home_featured">
    <div class="home_featured_content container content">
        <header class="home_featured_header">
            <h1>Tem um estabeleciento e precisa automatizar pedidos?</h1>
            <p>Cadastre-se e tenha controle total sobre seus pedidos, e clientes ativos.</p>
            <p><span data-go=".home_optin"
                     class="home_featured_btn gradient gradient-green gradient-hover radius transition icon-check-square-o">Criar minha conta e começar</span></p>
            <p class="features">Rápido | Simples | Gratuito</p>
        </header>
    </div>

    <div class="home_featured_app">
        <img src="<?= theme("/assets/images/home-app.jpg");?>" alt="CafeControl" title="CafeControl"/>
    </div>
</article>

<!--FEATURES-->
<div class="home_features">
    <section class="container content">
        <header class="home_features_header">
            <h2>O que você pode fazer com o CafeFood?</h2>
            <p>São 3 paços simples para você começar a gerenciar seus pedidos. É tudo muito fácil, veja:</p>
        </header>

        <div class="home_features_content">
            <article class="radius">
                <header>
                    <img alt="Contas a receber" title="Contas a receber" src="<?= theme("/assets/images/home_receive.jpg");?>"/>
                    <h3>Cadastro do Cardápio</h3>
                    <p>Cadastre seu Cardápio de forma simples e tranquila, separe seus produtos por categoria e ambiente de produção. </p>
                </header>
            </article>

            <article class="radius">
                <header>
                    <img alt="Contas a pagar" title="Contas a pagar" src="<?= theme("/assets/images/home_pay.jpg");?>"/>
                    <h3>Clientes Ativos</h3>
                    <p>Seja avisado de novos pedidos no Painel ADM, whatsapp e email. Não da para perder pedidos.</p>
                </header>
            </article>

            <article class="radius">
                <header>
                    <img alt="Controle e relatórios" title="Controle e relatórios" src="<?= theme("/assets/images/home_control.jpg");?>"/>
                    <h3>Controle e relatórios</h3>
                    <p>Acompanhe em tempo real, quais usuarios estão online, gere relatórios avançados e muito mais.</p>
                </header>
            </article>
        </div>
    </section>
</div>

<!--OPTIN-->
<article class="home_optin">
    <div class="home_optin_content container content">
        <header class="home_optin_content_flex">
            <h2>Cadastre-se no CaféFood e comece a gerenciar seus pedidos hoje mesmo</h2>
            <p>Receber pedidos, separar e enviar nunca foi tão facíl</p>
            <p>Com CafeFood você recebe notificações em tempo real, pedidos com rota demarcada, clientes ativos e relatórios avançados</p>
            <p>Pronto para começar a gerenciar?</p>
        </header>

        <div class="home_optin_content_flex">
            <span class="icon icon-check-square-o icon-notext"></span>
            <h4>Crie sua conta gratuitamente:</h4>
            <form action="<?= url("cadastro");?>" method="post" enctype="multipart/form-data">
                <input type="text" name="first_name" placeholder="Primeiro nome:"/>
                <input type="text" name="last_name" placeholder="Último nome:"/>
                <input type="email" name="email" placeholder="Melhor e-mail:"/>
                <input type="password" name="password" placeholder="Senha de acesso:"/>
                <button class="radius transition gradient gradient-green gradient-hover">Criar minha conta</button>
            </form>
        </div>
    </div>
</article>

<!--VIDEO-->
<article class="home_video">
    <div class="home_video_content container content">
        <header>
            <h2>Descubra o CafeFood</h2>
            <span data-modal="" class="icon-play-circle-o icon-notext transition"></span>
        </header>
    </div>

    <div class="home_video_modal j_modal_close">
        <div class="home_video_modal_box">
            <div class="embed">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/lDZGl9Wdc7Y?rel=0&amp;showinfo=0"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</article>

<!--BLOG-->
<?php if(!empty($blog)): ?>
<section class="blog">
    <div class="blog_content container content">
        <header class="blog_header">
            <h2>Nossos artigos</h2>
            <p>Confira nossas dicas para controlar melhor os seus pedidos</p>
        </header>
        <div class="blog_articles">
            <?php foreach ($blog as $post): ?>
            <?= $v->insert("blog-list", ["post"=>$post]);?>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<?php endif; ?>

