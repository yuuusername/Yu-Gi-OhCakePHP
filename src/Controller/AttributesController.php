<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Attributes Controller
 *
 * @property \App\Model\Table\AttributesTable $Attributes
 * @method \App\Model\Entity\Attribute[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AttributesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $attributes = $this->paginate($this->Attributes);

        $this->set(compact('attributes'));
    }

    /**
     * View method
     *
     * @param string|null $id Attribute id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attribute = $this->Attributes->get($id, [
            'contain' => ['Cards'],
        ]);

        $this->set(compact('attribute'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attribute = $this->Attributes->newEmptyEntity();
        if ($this->request->is('post')) {
            $attribute = $this->Attributes->patchEntity($attribute, $this->request->getData());
            if ($this->Attributes->save($attribute)) {
                $this->Flash->success(__('The attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attribute could not be saved. Please, try again.'));
        }
        $this->set(compact('attribute'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Attribute id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attribute = $this->Attributes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attribute = $this->Attributes->patchEntity($attribute, $this->request->getData());
            if ($this->Attributes->save($attribute)) {
                $this->Flash->success(__('The attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attribute could not be saved. Please, try again.'));
        }
        $this->set(compact('attribute'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Attribute id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attribute = $this->Attributes->get($id);
        if ($this->Attributes->delete($attribute)) {
            $this->Flash->success(__('The attribute has been deleted.'));
        } else {
            $this->Flash->error(__('The attribute could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
