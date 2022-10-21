<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Races Controller
 *
 * @property \App\Model\Table\RacesTable $Races
 * @method \App\Model\Entity\Race[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RacesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $races = $this->paginate($this->Races);

        $this->set(compact('races'));
    }

    /**
     * View method
     *
     * @param string|null $id Race id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $race = $this->Races->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('race'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $race = $this->Races->newEmptyEntity();
        if ($this->request->is('post')) {
            $race = $this->Races->patchEntity($race, $this->request->getData());
            if ($this->Races->save($race)) {
                $this->Flash->success(__('The race has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The race could not be saved. Please, try again.'));
        }
        $this->set(compact('race'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Race id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $race = $this->Races->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $race = $this->Races->patchEntity($race, $this->request->getData());
            if ($this->Races->save($race)) {
                $this->Flash->success(__('The race has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The race could not be saved. Please, try again.'));
        }
        $this->set(compact('race'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Race id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $race = $this->Races->get($id);
        if ($this->Races->delete($race)) {
            $this->Flash->success(__('The race has been deleted.'));
        } else {
            $this->Flash->error(__('The race could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
