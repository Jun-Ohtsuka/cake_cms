<!-- <?= $this->extend('../Layout/TwitterBootstrap/signin'); ?> -->
<h1>ログイン</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('name') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('ログイン') ?>
<?= $this->Form->end() ?>
