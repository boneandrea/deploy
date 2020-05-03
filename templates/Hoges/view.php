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
            <?= $this->Html->link(__('Edit Hoge'), ['action' => 'edit', $hoge->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Hoge'), ['action' => 'delete', $hoge->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hoge->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Hoges'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Hoge'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="hoges view content">
            <h3><?= h($hoge->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($hoge->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($hoge->name)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
