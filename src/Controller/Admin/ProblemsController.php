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
            'contain' => ['Users', 'RelatedProblems']
        ];
        $problems = $this->paginate($this->Problems);

        $this->set(compact('problems'));
        $this->set('_serialize', ['problems']);
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
                'contain' => ['Mediafiles', 'Users','RelatedProblems']
            ]);
        } else {
            $problem = $this->Problems->newEntity();
            $this->Problems->save($problem);
            return $this->redirect(['action' => 'edit', $problem->id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            //prevent removing photo on update then no new photo given
            if ($this->request->data['photo'] == '') {
                unset($this->request->data['photo']);
            }
            debug($this->request->data);
            //die();
            $problem = $this->Problems->patchEntity($problem, $this->request->data);

            $problem->is_active = true;
            if ($this->Problems->save($problem)) {
                $this->Flash->success(__('The problem has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The problem could not be saved. Please, try again.'));
            }
        }
        $problems = $this->Problems->find('list')->where('is_active', true);
        $users = $this->Problems->Users->find('list',[
            'valueField' => 'username'
            ]);
        $this->set(compact('problem', 'users', 'problems'));
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
