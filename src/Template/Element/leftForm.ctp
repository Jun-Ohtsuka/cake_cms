<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <ul class="side-nav">
    <li>ログイン中ユーザ名：<?= h($this->request->session()->read('Auth.User.name'))?></li>
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('記事一覧'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link("ユーザ一覧", ['controller' => 'Users', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('ログアウト'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
  </ul>
</nav>
