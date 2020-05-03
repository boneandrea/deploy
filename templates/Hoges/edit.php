<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hoge $hoge
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $hoge->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $hoge->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Hoges'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="hoges form content">
            <?= $this->Form->create($hoge) ?>
            <fieldset>
                <legend><?= __('Edit Hoge') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
