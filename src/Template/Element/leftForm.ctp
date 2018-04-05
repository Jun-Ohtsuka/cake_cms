<?php
$userName = $this->request->session()->read('Auth.User.name');
$userRole = $this->request->session()->read('Auth.User.role_id');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <ul class="side-nav">
    <li>ログイン中ユーザ名：<?= h($userName)?></li>
    <li class="heading"><?= __('MENU') ?></li>
    <li><?= $this->Html->link(__('記事一覧'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
    <?php if($userRole === 1): ?>
      <li><?= $this->Html->link(__('ユーザ一覧'), ['controller' => 'Users', 'action' => 'index']) ?></li>
      <li><?= $this->Html->link(__('タグ一覧'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
    <?php endif; ?>
    <li><?= $this->Html->link(__('ログアウト'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
  </ul>
</nav>
