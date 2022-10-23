<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Card> $cards
 */
?>
<div class="cards index content">
    <?= $this->Html->link(__('New Card'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cards') ?></h3>
    <div class="chip">
        <?= $this->Form->create(null,['type'=> 'get']) ?>
        <fieldset style="display: inline-flex">
            <?php
            echo $this->Form->control('name', ['value' => $this->request->getQuery('name')]);?>
        </fieldset>
        <fieldset style="display: inline-flex">
            <?php
            echo $this->Form->control('type_id', ['type' => 'text', 'value' => $this->request->getQuery('type_id')]);?>
        </fieldset>
        <fieldset style=" display: inline-flex">
            <?php
            echo $this->Form->control('level', ['value' => $this->request->getQuery('level')]);
            ?>
        </fieldset>
        <br>
        <?= $this->Form->button(__('Search')) ?>
        <?= $this->Html->link(__('Clear'), ['action' => 'index'], ['class' => 'button button-clear']) ?>
        <?= $this->Form->end() ?>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('type_id') ?></th>
                    <th><?= $this->Paginator->sort('level') ?></th>
                    <th><?= $this->Paginator->sort('race_id') ?></th>
                    <th><?= $this->Paginator->sort('attribute_id') ?></th>
                    <th><?= $this->Paginator->sort('atk') ?></th>
                    <th><?= $this->Paginator->sort('def') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cards as $card): ?>
                <tr>
                    <td><?= $this->Number->format($card->id) ?></td>
                    <td><?= h($card->name) ?></td>
                    <td><?= $card->has('type') ? $this->Html->link($card->type->name, ['controller' => 'Types', 'action' => 'view', $card->type->id]) : '' ?></td>
                    <td><?= $this->Number->format($card->level) ?></td>
                    <td><?= $card->has('race') ? $this->Html->link($card->race->name, ['controller' => 'Races', 'action' => 'view', $card->race->id]) : '' ?></td>
                    <td><?= $card->has('attribute') ? $this->Html->link($card->attribute->name, ['controller' => 'Attributes', 'action' => 'view', $card->attribute->id]) : '' ?></td>
                    <td><?= $this->Number->format($card->atk) ?></td>
                    <td><?= $this->Number->format($card->def) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $card->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $card->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $card->id], ['confirm' => __('Are you sure you want to delete # {0}?', $card->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
