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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $race->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $race->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Races'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="races form content">
            <?= $this->Form->create($race) ?>
            <fieldset>
                <legend><?= __('Edit Race') ?></legend>
                <?php
                    echo $this->Form->control('Race');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
