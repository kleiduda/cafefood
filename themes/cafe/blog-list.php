<article class="blog_article">
    <a title="<?= $post->title ;?>" href="<?= url("/blog/{$post->uri}"); ?>">
        <img title="<?= $post->title ;?>" alt="<?= $post->title ;?>" src="<?= image($post->cover, 600, 340); ?>"/>
    </a>
    <header>
        <p class="meta"><?= $post->category()->title ;?> &bull; <?= $post->first_name ." ". $post->last_name;?> &bull; <?= date_fmt($post->post_at) ;?></p>
        <h2><a title="Post" href="<?= url("/blog/{$post->uri}"); ?>"><?= $post->title;?></a></h2>
        <p><a title="Post" href="<?= url("/blog/{$post->uri}"); ?>"><?= $post->subtitle;?></a></p>
    </header>
</article>