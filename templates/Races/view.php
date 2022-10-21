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
            <h3><?= h($race->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Race') ?></th>
                    <td><?= h($race->Race) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($race->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
