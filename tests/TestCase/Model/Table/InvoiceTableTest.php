<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvoiceTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvoiceTable Test Case
 */
class InvoiceTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InvoiceTable
     */
    protected $Invoice;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Invoice',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Invoice') ? [] : ['className' => InvoiceTable::class];
        $this->Invoice = $this->getTableLocator()->get('Invoice', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Invoice);

        parent::tearDown();
    }
}
