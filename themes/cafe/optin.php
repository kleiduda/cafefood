<?php $v->layout("_theme"); ?>
<article class="optin_page">
    <div class="container content">
        <div class="optin_page_content">
            <img alt="<?= $data->title ;?>" title="<?= $data->title ;?>" src="<?= $data->image;?>"/>
            <h1><?= $data->title ;?></h1>
            <p><?= $data->desc ;?></p>
            <a href="<?= url("/entrar");?>" title="Logar-se"
               class="optin_page_btn gradient gradient-green gradient-hover radius">Fazer Login</a>
        </div>
    </div>
</article>

