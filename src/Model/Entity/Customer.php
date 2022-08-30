<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $street_address
 * @property string $city
 * @property string $contact
 * @property string $contact_number
 * @property string $contact_city
 * @property string $contact_address
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Invoice[] $invoice
 */
class Customer extends Entity
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
        'email' => true,
        'phone_number' => true,
        'street_address' => true,
        'city' => true,
        'contact' => true,
        'contact_number' => true,
        'contact_city' => true,
        'contact_address' => true,
        'created' => true,
        'modified' => true,
        'invoice' => true,
    ];
}
