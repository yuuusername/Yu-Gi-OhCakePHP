<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Race> $races
 */
?>
<div class="races index content">
    <?= $this->Html->link(__('New Race'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Races') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Race') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($races as $race): ?>
                <tr>
                    <td><?= $this->Number->format($race->id) ?></td>
                    <td><?= h($race->Race) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $race->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $race->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $race->id], ['confirm' => __('Are you sure you want to delete # {0}?', $race->id)]) ?>
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
