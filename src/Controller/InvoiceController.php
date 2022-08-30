<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;



/**
 * Invoice Controller
 *
 * @property \App\Model\Table\InvoiceTable $Invoice
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoiceController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customer'],
        ];
        $invoice = $this->paginate($this->Invoice);

        $this->set(compact('invoice'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $invoice = $this->Invoice->get($id, [
    //         'contain' => ['Customer', 'InvoiceItem'],
    //     ]);

    //     $this->set(compact('invoice'));
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoice = $this->Invoice->newEmptyEntity();
        if ($this->request->is('post')) {
            $invoice = $this->Invoice->patchEntity($invoice, $this->request->getData());
            if ($this->Invoice->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
        $customer = $this->Invoice->Customer->find('list', ['limit' => 200])->all();
        $this->set(compact('invoice', 'customer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoice = $this->Invoice->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoice->patchEntity($invoice, $this->request->getData());
            if ($this->Invoice->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
        $customer = $this->Invoice->Customer->find('list', ['limit' => 200])->all();
        $this->set(compact('invoice', 'customer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoice = $this->Invoice->get($id);
        if ($this->Invoice->delete($invoice)) {
            $this->Flash->success(__('The invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function view($id = null)
    {
        $db = ConnectionManager::get('default');

        $sql = "SELECT
                    i.id as invoice_id,
                    c.id as customer_id,
                    c.name as customer_name,
                    c.street_address,
                    c.city,
                    c.phone_number,
                    contact,
                    contact_number,
                    contact_city,
                    contact_address,
                    p.id as product_id,
                    p.name as product_name,
                    it.qty,
                    p.price,
                    p.is_taxed,
                    i.created
                FROM invoice i
                INNER JOIN invoice_item it ON it.invoice_id = i.id
                INNER JOIN customer c ON c.id = i.customer_id
                INNER JOIN product p ON p.id = it.product_id
                WHERE i.id = $id;
            ";

        $data = $db->execute($sql)->fetchAll('assoc');

        $due = date('Y-m-d', strtotime($data[0]['created']. ' + 30 days'));

        $results = [
            'company'=> [
                'name' => $data[0]['customer_name'],
                'street' => $data[0]['street_address'],
                'city' => $data[0]['street_address'],
                'phone' => $data[0]['phone_number'],

            ],
            'contact'=> [
                'name' => $data[0]['contact'],
                'street' => $data[0]['contact_address'],
                'city' => $data[0]['contact_city'],
                'phone' => $data[0]['contact_number'],
            ],
            'invoice'=> [
                'id' => $data[0]['invoice_id'],
                'created' => $data[0]['created'],
                'customer_id' => $data[0]['customer_id'],
                'due_date'=> $due,
            ]

        ];

        $all_products = [];

        $subtotal = 0;
        $taxable = 0;
        $tax_rate = 6.25;
        $tax_due = 0;
        foreach($data as $d){
            $products['product_name'] = $d['product_name'];
            $products['qty'] = $d['qty'];
            $products['price'] = $d['price'];
            $products['is_taxed'] = ($d['is_taxed'] == true ? 'x' : '');
            $subtotal+= $products['price'];
            $taxable+= ($d['is_taxed'] == true ? $products['price'] : 0);

            $all_products[] = $products;
            $tax_due = $taxable / ($tax_rate/100);

        }

        $total = $subtotal + $tax_due;

        array_push($results, $all_products, $subtotal, $taxable, $tax_rate, $tax_due, $total);

        $this->set(['results'=>$results]);
    }
}