<?php
namespace KoVicky\Controller\Admin;

use KoVicky\Controller\AppController;

/**
 * Problems Controller
 *
 * @property \App\Model\Table\ProblemsTable $Problems
 */
class ProblemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Categories']
        ];
        $problems = $this->paginate($this->Problems);

        $this->set(compact('problems'));
        $this->set('_serialize', ['problems']);
    }

    /**
     * View method
     *
     * @param string|null $id Problem id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $problem = $this->Problems->get($id, [
            'contain' => ['Users', 'Categories', 'Solutions']
        ]);

        $this->set('problem', $problem);
        $this->set('_serialize', ['problem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Problem id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($id != null) {
            $problem = $this->Problems->get($id, [
                'contain' => []
            ]);
        } else {
            $problem = $this->Problems->newEntity();
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $problem = $this->Problems->patchEntity($problem, $this->request->data);
            if ($this->Problems->save($problem)) {
                $this->Flash->success(__('The problem has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The problem could not be saved. Please, try again.'));
            }
        }
        $users = $this->Problems->Users->find('list', ['limit' => 200]);
        $categories = $this->Problems->Categories->find('list', ['limit' => 200]);
        $this->set(compact('problem', 'users', 'categories'));
        $this->set('_serialize', ['problem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Problem id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $problem = $this->Problems->get($id);
        if ($this->Problems->delete($problem)) {
            $this->Flash->success(__('The problem has been deleted.'));
        } else {
            $this->Flash->error(__('The problem could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
