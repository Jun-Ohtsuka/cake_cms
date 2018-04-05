<!-- File: src/Template/Articles/index.ctp  (削除リンク付き) -->
<!-- 左メニューのテンプレート読み込み -->
<?= $this->element('leftForm') ?>
<div class="users index large-9 medium-8 columns content">
  <h1>記事一覧</h1>
  <p><?= $this->Html->link("記事の追加", ['action' => 'add']) ?></p>
    <?PHP
    echo $this->Form->create('searchTags', ['url' => ['action' => '/tagged'], 'type' => 'get']);
    echo $this->Form->control("pass", ['label' => 'タグ検索'], ['type' => 'text']);
    echo $this->Form->button(__('検索'));
    echo $this->Form->end();
    ?>
  <table>
    <tr>
      <th>タイトル</th>
      <th>作成者</th>
      <th>タグ</th>
      <th>作成日時</th>
      <th>操作</th>
    </tr>

    <!-- ここで、$articles クエリーオブジェクトを繰り返して、記事情報を出力します -->
    <?php
    // pr($articles);
    foreach ($articles as $article): ?>
    <tr>
      <td>
        <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
      </td>
      <td>
        <?= $article->user->name ?>
      </td>
      <td>
        <?php
        $strTags = '';
        //記事に登録されているtag名だけを「, 」区切りで表示する
        $TagTitles = array_column($article->tags, 'title');
        $strTags = implode(', ' ,$TagTitles);
        echo h($strTags);
        ?>
      </td>
      <td>
        <?= $article->created->i18nFormat('YYYY/MM/dd HH:mm:ss') ?>
      </td>
      <td>
        <?= $this->Html->link('編集', ['action' => 'edit', $article->slug]) ?>
        <?= $this->Form->postLink(
          '削除',
          ['action' => 'delete', $article->slug],
          ['confirm' => 'よろしいですか?'])
          ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
