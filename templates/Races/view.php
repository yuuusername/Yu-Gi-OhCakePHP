<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Race $race
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Race'), ['action' => 'edit', $race->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Race'), ['action' => 'delete', $race->id], ['confirm' => __('Are you sure you want to delete # {0}?', $race->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Races'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Race'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="races view content">
            <h3><?= h($race->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($race->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($race->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Cards') ?></h4>
                <?php if (!empty($race->cards)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Type Id') ?></th>
                            <th><?= __('Level') ?></th>
                            <th><?= __('Race Id') ?></th>
                            <th><?= __('Attribute Id') ?></th>
                            <th><?= __('Atk') ?></th>
                            <th><?= __('Def') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($race->cards as $cards) : ?>
                        <tr>
                            <td><?= h($cards->id) ?></td>
                            <td><?= h($cards->name) ?></td>
                            <td><?= h($cards->type_id) ?></td>
                            <td><?= h($cards->level) ?></td>
                            <td><?= h($cards->race_id) ?></td>
                            <td><?= h($cards->attribute_id) ?></td>
                            <td><?= h($cards->atk) ?></td>
                            <td><?= h($cards->def) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Cards', 'action' => 'view', $cards->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Cards', 'action' => 'edit', $cards->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cards', 'action' => 'delete', $cards->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cards->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
