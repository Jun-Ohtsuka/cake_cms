<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Tag[]|\Cake\Collection\CollectionInterface $tags
*/
?>
<!-- 左メニューのテンプレート読み込み -->
<?= $this->element('menuForm') ?>
<h3 style="padding:60px 0 0 0"><?= __('タグ一覧') ?></h3>
<table cellpadding="0" cellspacing="0" CLASS="table">
  <thead>
    <tr>
      <th scope="col"><?= $this->Paginator->sort('id') ?></th>
      <th scope="col"><?= $this->Paginator->sort('title') ?></th>
      <th scope="col"><?= $this->Paginator->sort('created') ?></th>
      <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
      <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tags as $tag): ?>
      <tr>
        <td><?= $this->Number->format($tag->id) ?></td>
        <td><?= h($tag->title) ?></td>
        <td><?= h($tag->created->i18nFormat('YYYY/MM/dd HH:mm:ss')) ?></td>
        <td><?= h($tag->modified->i18nFormat('YYYY/MM/dd HH:mm:ss')) ?></td>
        <td class="actions">
          <?= $this->Html->link(__('詳細'), ['action' => 'view', $tag->id]) ?>
          <?= $this->Html->link(__('修正'), ['action' => 'edit', $tag->id]) ?>
          <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]) ?>
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
