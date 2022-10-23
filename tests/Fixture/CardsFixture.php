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
                'name' => 'Lorem ipsum dolor sit amet',
                'type_id' => 1,
                'level' => 1,
                'race_id' => 1,
                'attribute_id' => 1,
                'atk' => 1,
                'def' => 1,
            ],
        ];
        parent::init();
    }
}
