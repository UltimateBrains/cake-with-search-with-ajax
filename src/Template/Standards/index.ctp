<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Standard[]|\Cake\Collection\CollectionInterface $standards
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Standard'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Batches'), ['controller' => 'Batches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Batch'), ['controller' => 'Batches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Batches Students'), ['controller' => 'BatchesStudents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Batches Student'), ['controller' => 'BatchesStudents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="standards index large-9 medium-8 columns content">
    <h3><?= __('Standards') ?></h3>
    <table cellpadding="0" cellspacing="0">
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
            <?php foreach ($standards as $standard): ?>
            <tr>
                <td><?= $this->Number->format($standard->id) ?></td>
                <td><?= h($standard->title) ?></td>
                <td><?= h($standard->created) ?></td>
                <td><?= h($standard->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $standard->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $standard->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $standard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $standard->id)]) ?>
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
