<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Solutions Controller
 *
 * @property \App\Model\Table\SolutionsTable $Solutions
 */
class SolutionsController extends AppController
{

    /**
     * Login method
     *
     * @return \Cake\Network\Response|void
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid credentials, try again'));
        }
    }

    /**
     * Logout method
     *
     * @return \Cake\Network\Response
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Problems', 'Users']
        ];
        $solutions = $this->paginate($this->Solutions);

        $this->set(compact('solutions'));
        $this->set('_serialize', ['solutions']);
    }

    /**
     * View method
     *
     * @param string|null $id Solution id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $solution = $this->Solutions->get($id, [
            'contain' => ['Problems', 'Users', 'Mediafiles']
        ]);

        $this->set('solution', $solution);
        $this->set('_serialize', ['solution']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Solution id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($id != null) {
            $solution = $this->Solutions->get($id, [
                'contain' => []
            ]);
        } else {
            $solution = $this->Solutions->newEntity();
            $this->Solutions->save($solution);
            return $this->redirect(['action' => 'edit', $solution->id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $solution = $this->Solutions->patchEntity($solution, $this->request->data);
            $solution->is_active = true;
            if ($this->Solutions->save($solution)) {
                $this->Flash->success(__('The solution has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The solution could not be saved. Please, try again.'));
            }
        }
        $problems = $this->Solutions->Problems->find('list', ['limit' => 200]);
        $users = $this->Solutions->Users->find('list', ['limit' => 200]);
        $this->set(compact('solution', 'problems', 'users'));
        $this->set('_serialize', ['solution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Solution id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $solution = $this->Solutions->get($id);
        if ($this->Solutions->delete($solution)) {
            $this->Flash->success(__('The solution has been deleted.'));
        } else {
            $this->Flash->error(__('The solution could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
