<!-- File: src/Template/Articles/index.ctp  (削除リンク付き) -->
<div>ログイン中ユーザ名：<?= h($this->request->session()->read('Auth.User.name'))?></div>
<div><?= $this->Html->link("ユーザ一覧", ['action' => '../users/index']) ?></div>
<h1>記事一覧</h1>
<p><?= $this->Html->link("記事の追加", ['action' => 'add']) ?></p>
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
  foreach ($articles as $article): ?>
  <tr>
    <td>
      <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
    </td>
    <td>
      <?=($article->user->name)?>
    </td>
    <td>
      <?= $article->tags ?>
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
