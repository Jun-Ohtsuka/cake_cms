<?= $this->element('leftForm') ?>
<div class="users index large-9 medium-8 columns content">
    <h1>
        Articles tagged with
        <?php 
        $impTags = implode(' or ', $tags);
        echo h($impTags)
        ?>
    </h1>

    <section>
    <?php 
    // pr($articles);
    foreach ($articles as $article):
    // pr($article);
    ?>
        <article>
            <!-- リンクの作成に HtmlHelper を使用 -->
            <h4><?= $this->Html->link(
                $article->title,
                ['controller' => 'Articles', 'action' => 'view', $article->slug]
            ) ?></h4>
            <span><?= h($article->created) ?>
        </article>
    <?php endforeach; ?>
    </section>
</div>