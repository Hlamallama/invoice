<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoiceItem[]|\Cake\Collection\CollectionInterface $invoiceItem
 */
?>
<div class="invoiceItem index content">
    <?= $this->Html->link(__('New Invoice Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Invoice Item') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('invoice_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('qty') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoiceItem as $invoiceItem): ?>
                <tr>
                    <td><?= $this->Number->format($invoiceItem->id) ?></td>
                    <td><?= $invoiceItem->invoice_id === null ? '' : $this->Number->format($invoiceItem->invoice_id) ?></td>
                    <td><?= $invoiceItem->has('product') ? $this->Html->link($invoiceItem->product->name, ['controller' => 'Product', 'action' => 'view', $invoiceItem->product->id]) : '' ?></td>
                    <td><?= $this->Number->format($invoiceItem->qty) ?></td>
                    <td><?= h($invoiceItem->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $invoiceItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoiceItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoiceItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceItem->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
