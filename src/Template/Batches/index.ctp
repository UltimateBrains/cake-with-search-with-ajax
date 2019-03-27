<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batch[]|\Cake\Collection\CollectionInterface $batches
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Batch'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Standards'), ['controller' => 'Standards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Standard'), ['controller' => 'Standards', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="batches index large-9 medium-8 columns content">
    <h3><?= __('Batches') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('standard_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teacher_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($batches as $batch): ?>
            <tr>
                <td><?= $this->Number->format($batch->id) ?></td>
                <td><?= h($batch->title) ?></td>
                <td><?= $batch->has('subject') ? $this->Html->link($batch->subject->title, ['controller' => 'Subjects', 'action' => 'view', $batch->subject->id]) : '' ?></td>
                <td><?= $batch->has('standard') ? $this->Html->link($batch->standard->title, ['controller' => 'Standards', 'action' => 'view', $batch->standard->id]) : '' ?></td>
                <td><?= $batch->has('teacher') ? $this->Html->link($batch->teacher->title, ['controller' => 'Teachers', 'action' => 'view', $batch->teacher->id]) : '' ?></td>
                <td><?= h($batch->created) ?></td>
                <td><?= h($batch->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $batch->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $batch->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $batch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batch->id)]) ?>
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
