<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvoiceFixture
 */
class InvoiceFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'invoice';
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
                'customer_id' => 1,
                'created' => 1661878155,
            ],
        ];
        parent::init();
    }
}
