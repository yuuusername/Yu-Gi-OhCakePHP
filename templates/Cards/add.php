<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 * @var \Cake\Collection\CollectionInterface|string[] $types
 * @var \Cake\Collection\CollectionInterface|string[] $races
 * @var \Cake\Collection\CollectionInterface|string[] $attributes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cards'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cards form content">
            <?= $this->Form->create($card) ?>
            <fieldset>
                <legend><?= __('Add Card') ?></legend>
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
