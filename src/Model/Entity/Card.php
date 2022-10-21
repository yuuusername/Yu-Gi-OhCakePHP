<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Card Entity
 *
 * @property int $id
 * @property string $Name
 * @property string $Type
 * @property int $Level
 * @property string $Race
 * @property string $Attribute
 * @property int $ATK
 * @property int $DEF
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
        'Name' => true,
        'Type' => true,
        'Level' => true,
        'Race' => true,
        'Attribute' => true,
        'ATK' => true,
        'DEF' => true,
    ];
}
