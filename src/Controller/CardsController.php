<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cards Controller
 *
 * @property \App\Model\Table\CardsTable $Cards
 * @method \App\Model\Entity\Card[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CardsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //Initial query to retrieve all cards
        $this->paginate = ['contain' => ['Types','Races','Attributes'],];
        $cards_query = $this->Cards->find();

        // Test criteria and add as necessary
        $search_name = $this->request->getQuery('name');
        if (!empty($search_name)) {
            $cards_query->where(['Cards.name LIKE' => "%$search_name%"]);
        }
        $search_type = $this->request->getQuery('type_id');
        if (!empty($search_type)) {
            $cards_query->where(['Types.name LIKE' => "%$search_type%"]);
        }
        $search_level = $this->request->getQuery('level');
        if (!empty($search_level)) {
            $cards_query->where(['level >=' => $search_level]);
        }

        // Insert query into paginate
        $cards = $this->paginate($cards_query);
        $this->set(compact('cards'));
    }

    /**
     * View method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $card = $this->Cards->get($id, [
            'contain' => ['Types', 'Races', 'Attributes'],
        ]);

        $this->set(compact('card'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $card = $this->Cards->newEmptyEntity();
        if ($this->request->is('post')) {
            $card = $this->Cards->patchEntity($card, $this->request->getData());
            if ($this->Cards->save($card)) {
                $this->Flash->success(__('The card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The card could not be saved. Please, try again.'));
        }
        $types = $this->Cards->Types->find('list', ['limit' => 200])->all();
        $races = $this->Cards->Races->find('list', ['limit' => 200])->all();
        $attributes = $this->Cards->Attributes->find('list', ['limit' => 200])->all();
        $this->set(compact('card', 'types', 'races', 'attributes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $card = $this->Cards->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $card = $this->Cards->patchEntity($card, $this->request->getData());
            if ($this->Cards->save($card)) {
                $this->Flash->success(__('The card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The card could not be saved. Please, try again.'));
        }
        $types = $this->Cards->Types->find('list', ['limit' => 200])->all();
        $races = $this->Cards->Races->find('list', ['limit' => 200])->all();
        $attributes = $this->Cards->Attributes->find('list', ['limit' => 200])->all();
        $this->set(compact('card', 'types', 'races', 'attributes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $card = $this->Cards->get($id);
        if ($this->Cards->delete($card)) {
            $this->Flash->success(__('The card has been deleted.'));
        } else {
            $this->Flash->error(__('The card could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
