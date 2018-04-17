<?php
$userName = $this->request->session()->read('Auth.User.name');
$userRole = $this->request->session()->read('Auth.User.role_id');
$userId = $this->request->session()->read('Auth.User.id');
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <!-- <div class="form-inline"> -->
  <ul  class="nav navbar-nav form-inline text-cehter">
    <li><?= $this->Html->link(__('記事一覧'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
    <?php if ($userRole === 1): ?>
      <li><?= $this->Html->link(__('ユーザ一覧'), ['controller' => 'Users', 'action' => 'index']) ?></li>
      <li><?= $this->Html->link(__('タグ一覧'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
    <?php endif; ?>
  </ul>
  <?= $this->Form->create('searchTags', ['url' => ['action' => '/tagged'], 'type' => 'get', 'class' => 'navbar-form navbar-left']) ?>
  <!-- <div class="form-group"> -->
  <?= $this->Form->control("pass", ['label' => 'タグ検索：'], ['type' => 'text', 'size' =>'200000', 'class' => 'form-control'])?>
  <!-- </div> -->
  <?= $this->Form->button(__('検索'), ['class' => 'navbar-btn']) ?>
  <?= $this->Form->end() ?>
  <ul  class="nav navbar-nav form-inline text-cehter">
    <li><?= $this->Html->link(__('ログアウト'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
  </ul>
  <!-- </div> -->
</nav>

<div class="row" style="padding:60px 0 0 0">
  <!-- left -->
  <div class="col-md-2">
    <!-- パネルで囲む -->
    <div class="panel panel-default">
      <div class="panel-heading">
        SideMenu
      </div>
      <!-- 敢えてbodyを作らないことで、メニューを詰める -->
      <!-- <div class="panel-body"> -->
      <ul class="nav nav-pills nav-stacked">
        <li>ログインユーザ：<?= $this->Html->link(h($userName), ['controller' => 'Users', 'action' => 'view', $userId])?></li>
        <li><?= $this->Html->link("記事の追加", ['controller' => 'Articles', 'action' => 'add']) ?></li>
      </ul>
      <!-- </div> -->
    </div>
  </div>
