<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 * @var string[]|\Cake\Collection\CollectionInterface $types
 * @var string[]|\Cake\Collection\CollectionInterface $races
 * @var string[]|\Cake\Collection\CollectionInterface $attributes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $card->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $card->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cards'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cards form content">
            <?= $this->Form->create($card) ?>
            <fieldset>
                <legend><?= __('Edit Card') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('type_id', ['options' => $types]);
                    echo $this->Form->control('level');
                    echo $this->Form->control('race_id', ['options' => $races]);
                    echo $this->Form->control('attribute_id', ['options' => $attributes]);
                    echo $this->Form->control('atk');
                    echo $this->Form->control('def');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
