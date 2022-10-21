<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attribute $attribute
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Attribute'), ['action' => 'edit', $attribute->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Attribute'), ['action' => 'delete', $attribute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attribute->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Attributes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Attribute'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="attributes view content">
            <h3><?= h($attribute->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Attribute') ?></th>
                    <td><?= h($attribute->Attribute) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($attribute->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
