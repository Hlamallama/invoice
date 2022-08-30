<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property bool|null $is_taxed
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\InvoiceItem[] $invoice_item
 */
class Product extends Entity
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
        'price' => true,
        'is_taxed' => true,
        'created' => true,
        'invoice_item' => true,
    ];
}
