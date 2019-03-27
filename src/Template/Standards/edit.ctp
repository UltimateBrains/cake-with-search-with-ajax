<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Standard $standard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $standard->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $standard->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Standards'), ['action' => 'index']) ?></li>
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
<div class="standards form large-9 medium-8 columns content">
    <?= $this->Form->create($standard) ?>
    <fieldset>
        <legend><?= __('Edit Standard') ?></legend>
        <?php
            echo $this->Form->control('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
