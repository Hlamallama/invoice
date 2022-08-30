<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InvoiceItem Entity
 *
 * @property int $id
 * @property int|null $invoice_id
 * @property int|null $product_id
 * @property int $qty
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Product $product
 */
class InvoiceItem extends Entity
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
        'invoice_id' => true,
        'product_id' => true,
        'qty' => true,
        'created' => true,
        'product' => true,
    ];
}
