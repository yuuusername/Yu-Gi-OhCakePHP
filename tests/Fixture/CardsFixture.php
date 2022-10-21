<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CardsFixture
 */
class CardsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'Name' => 'Lorem ipsum dolor sit amet',
                'Type' => 'Lorem ipsum dolor sit amet',
                'Level' => 1,
                'Race' => 'Lorem ipsum dolor ',
                'Attribute' => 'Lorem ipsum dolor ',
                'ATK' => 1,
                'DEF' => 1,
            ],
        ];
        parent::init();
    }
}
