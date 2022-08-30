<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * InvoiceItem Controller
 *
 * @method \App\Model\Entity\InvoiceItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoiceItemController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $invoiceItem = $this->paginate($this->InvoiceItem);

        $this->set(compact('invoiceItem'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoice Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoiceItem = $this->InvoiceItem->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('invoiceItem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoiceItem = $this->InvoiceItem->newEmptyEntity();
        if ($this->request->is('post')) {
            $invoiceItem = $this->InvoiceItem->patchEntity($invoiceItem, $this->request->getData());
            if ($this->InvoiceItem->save($invoiceItem)) {
                $this->Flash->success(__('The invoice item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice item could not be saved. Please, try again.'));
        }
        $this->set(compact('invoiceItem'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoiceItem = $this->InvoiceItem->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoiceItem = $this->InvoiceItem->patchEntity($invoiceItem, $this->request->getData());
            if ($this->InvoiceItem->save($invoiceItem)) {
                $this->Flash->success(__('The invoice item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice item could not be saved. Please, try again.'));
        }
        $this->set(compact('invoiceItem'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice Item id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoiceItem = $this->InvoiceItem->get($id);
        if ($this->InvoiceItem->delete($invoiceItem)) {
            $this->Flash->success(__('The invoice item has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
