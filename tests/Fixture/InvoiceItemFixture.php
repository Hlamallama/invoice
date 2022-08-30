<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvoiceItemFixture
 */
class InvoiceItemFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'invoice_item';
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
                'invoice_id' => 1,
                'product_id' => 1,
                'qty' => 1,
                'created' => 1661878425,
            ],
        ];
        parent::init();
    }
}
