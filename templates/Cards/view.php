<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Card'), ['action' => 'edit', $card->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Card'), ['action' => 'delete', $card->id], ['confirm' => __('Are you sure you want to delete # {0}?', $card->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cards'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Card'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cards view content">
            <h3><?= h($card->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($card->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= $card->has('type') ? $this->Html->link($card->type->name, ['controller' => 'Types', 'action' => 'view', $card->type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Race') ?></th>
                    <td><?= $card->has('race') ? $this->Html->link($card->race->name, ['controller' => 'Races', 'action' => 'view', $card->race->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Attribute') ?></th>
                    <td><?= $card->has('attribute') ? $this->Html->link($card->attribute->name, ['controller' => 'Attributes', 'action' => 'view', $card->attribute->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($card->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Level') ?></th>
                    <td><?= $this->Number->format($card->level) ?></td>
                </tr>
                <tr>
                    <th><?= __('Atk') ?></th>
                    <td><?= $this->Number->format($card->atk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Def') ?></th>
                    <td><?= $this->Number->format($card->def) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
