<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoiceItem $invoiceItem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Invoice Item'), ['action' => 'edit', $invoiceItem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Invoice Item'), ['action' => 'delete', $invoiceItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceItem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Invoice Item'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Invoice Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="invoiceItem view content">
            <h3><?= h($invoiceItem->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $invoiceItem->has('product') ? $this->Html->link($invoiceItem->product->name, ['controller' => 'Product', 'action' => 'view', $invoiceItem->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($invoiceItem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice Id') ?></th>
                    <td><?= $invoiceItem->invoice_id === null ? '' : $this->Number->format($invoiceItem->invoice_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qty') ?></th>
                    <td><?= $this->Number->format($invoiceItem->qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($invoiceItem->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
