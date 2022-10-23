<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Card Entity
 *
 * @property int $id
 * @property string $name
 * @property int $type_id
 * @property int $level
 * @property int $race_id
 * @property int $attribute_id
 * @property int $atk
 * @property int $def
 *
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Race $race
 * @property \App\Model\Entity\Attribute $attribute
 */
class Card extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'type_id' => true,
        'level' => true,
        'race_id' => true,
        'attribute_id' => true,
        'atk' => true,
        'def' => true,
        'type' => true,
        'race' => true,
        'attribute' => true,
    ];
}
