<?php $v->layout("_theme");?>
<article class="not_found">
    <div class="container content">
        <header class="not_found_header">
            <p class="error">&bullet;<?= $error->code; ?>&bullet;</p>
            <h1><?= $error->title;?></h1>
            <p><?= $error->message;?></p>
            <a class="not_found_btn gradient gradient-green gradient-hover transition radius" title="<?= $error->linkTitle;?>" href="<?= $error->link;?>"><?= $error->linkTitle;?></a>
        </header>
    </div>
</article>

