<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
*/
?>
<!-- 左メニューのテンプレート読み込み -->
<?= $this->element('leftForm') ?>
<div class="users index large-9 medium-8 columns content">
  <h3><?= __('ユーザ一覧') ?></h3>
  <p><?= $this->Html->link(__('ユーザ新規作成'), ['action' => 'add']) ?></p>
  <table cellpadding="0" cellspacing="0">
    <thead>
      <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('名前') ?></th>
        <th scope="col"><?= $this->Paginator->sort('権限') ?></th>
        <th scope="col"><?= $this->Paginator->sort('メールアドレス') ?></th>
        <th scope="col"><?= $this->Paginator->sort('パスワード') ?></th>
        <th scope="col"><?= $this->Paginator->sort('登録日') ?></th>
        <th scope="col"><?= $this->Paginator->sort('更新日') ?></th>
        <th scope="col" class="actions"><?= __('操作') ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?= $this->Number->format($user->id) ?></td>
          <td><?= $this->Html->link($user->name, ['action' => 'view', $user->id]) ?></td>
          <td><?= h($user->Roles['name']) ?></td>
          <td><?= h($user->email) ?></td>
          <td><?= h($user->password) ?></td>
          <td><?= h($user->created->i18nFormat('YYYY/MM/dd HH:mm:ss')) ?></td>
          <td><?= h($user->modified->i18nFormat('YYYY/MM/dd HH:mm:ss')) ?></td>
          <td class="actions">
            <?= $this->Html->link(__('詳細'), ['action' => 'view', $user->id]) ?>
            <?= $this->Html->link(__('修正'), ['action' => 'edit', $user->id]) ?>
            <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="paginator">
    <ul class="pagination">
      <?= $this->Paginator->first('<< ' . __('first')) ?>
      <?= $this->Paginator->prev('< ' . __('previous')) ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next(__('next') . ' >') ?>
      <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
  </div>
</div>
