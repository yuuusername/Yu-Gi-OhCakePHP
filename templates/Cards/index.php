<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Card> $cards
 */
?>
<div class="cards index content">
    <?= $this->Html->link(__('New Card'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cards') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Name') ?></th>
                    <th><?= $this->Paginator->sort('Type') ?></th>
                    <th><?= $this->Paginator->sort('Level') ?></th>
                    <th><?= $this->Paginator->sort('Race') ?></th>
                    <th><?= $this->Paginator->sort('Attribute') ?></th>
                    <th><?= $this->Paginator->sort('ATK') ?></th>
                    <th><?= $this->Paginator->sort('DEF') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cards as $card): ?>
                <tr>
                    <td><?= $this->Number->format($card->id) ?></td>
                    <td><?= h($card->Name) ?></td>
                    <td><?= h($card->Type) ?></td>
                    <td><?= $this->Number->format($card->Level) ?></td>
                    <td><?= h($card->Race) ?></td>
                    <td><?= h($card->Attribute) ?></td>
                    <td><?= $this->Number->format($card->ATK) ?></td>
                    <td><?= $this->Number->format($card->DEF) ?></td>
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
