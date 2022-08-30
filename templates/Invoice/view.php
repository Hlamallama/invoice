<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
?>
<div class="row">
    <aside class="column">
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="invoice view content">
            <div class ="row">
                <!-- company details -->
                <div class="column">
                <?= h($results['company']['name']) ?></br>
                <?= h($results['company']['street']) ?></br>
                <?= h($results['company']['city']) ?></br>
                <?= h($results['company']['phone']) ?></br></br></br>

                <h3 class="heading" style="background: #1E90FF;"><?= __('Bill to') ?></h3>
                <?= h($results['contact']['name']) ?></br>
                <?= h($results['contact']['street']) ?></br>
                <?= h($results['contact']['city']) ?></br>
                <?= h($results['contact']['phone']) ?></br></br></br>
                </div>

                <!-- invoice details -->
                <div class="column">
                    <h3><?= h('Invoice') ?></h3>
                    <table  border="1">
                        <tr>
                            <td>Date:<?= h($results['invoice']['created']) ?></td>
                        </tr>
                        <tr>
                            <td>Invoice #: <?= h($results['invoice']['id']) ?></td>
                        </tr>
                        <tr>
                            <td>Customer ID: <?= h($results['invoice']['customer_id']) ?></td>
                        </tr>
                        <tr>
                            <td style="background: #ADD8E6;">Due Date: <?= h($results['invoice']['due_date']) ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- products details-->
            <div>
                <table  border="1">
                    <tr style="background: #1E90FF;">
                        <th><?= __('Description') ?></th>
                        <th><?= __('Tax') ?></th>
                        <th><?= __('Amount') ?></th>
                    </tr>
                    <?php foreach ($results[0] as $product): ?>
                    <tr>
                        <td><?= h($product['product_name']) ?></td>
                        <td><?= h($product['is_taxed']) ?></td>
                        <td><?= h($product['price']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            </br>
            </br>

            <div class ="row">
                <!-- other comments -->
                <div class="column">
                    <table border="1" style=" border: 1px solid;padding:3px;width:700px; height:100px;" >
                        <tr>
                            <td style="background: #1E90FF;"> <?= __('Other comments') ?></td>
                        </tr>
                        <tr>
                            <td>
                                1. Total payment due in 30 days </br>
                                2. Please include invoice number on your cheque.
                            </td>
                        </tr>

                    </table>
                </div>

                <!-- totals -->
                <div class="column">
                    <table alight="right" border="1" style=" border: 1px solid;padding:3px;width:200px; height:100px;" >
                        <tr>
                        <td> Subtotal: <?= h($results[1]) ?></td>
                        </tr>
                        <tr>
                            <td>Taxable: <?= h($results[2]) ?></td>
                        </tr>
                        <tr>
                            <td>Tax rate: <?= h($results[3]) ?>%</td>
                        </tr>
                        <tr>
                            <td>Tax Due: <?= h($results[4]) ?></td>
                        </tr>
                        <tr>
                            <td style="background: #ADD8E6;"> Total: $<?= h($results[5]) ?></td>
                        </tr>
                    </table>
                </br>
                Make your checks payable to</br>
                Hlami's Super foods.
                </div>
            </div>
            <div alight="center">

            If you have any questions about this invoice, please contact </br>
                        Hlamalani, 0731051452, hshihlomulo@gmail.com</br>
                            Thank you for your business.


            </div>

        </div>
    </div>
</div>
