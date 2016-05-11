<?php
namespace KoVicky\Controller;

use KoVicky\Controller\AppController;
use Cake\Event\Event;

/**
 * Problems Controller
 *
 * @property \App\Model\Table\ProblemsTable $Problems
 */
class ProblemsController extends AppController
{

    public function beforeFilter(Event $event)
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //show only the 6 main problems
        $problems = $this->Problems->find('all')
                ->where([
                    'parent_id is NULL',
                    'is_active', true
                ]);

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
            'contain' => ['ChildProblems', 'Mediafiles']
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
            $problem->user_id = $this->Auth->user('id');
            $this->Problems->save($problem);
            return $this->redirect(['action' => 'edit', $problem->id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            //prevent removing photo on update then no new photo given
            if ($this->request->data['photo'] == '') {
                unset($this->request->data['photo']);
            }

            $problem = $this->Problems->patchEntity($problem, $this->request->data);
            $problem->user_id = $this->Auth->user('id');
            $problem->is_active = true;
            if ($this->Problems->save($problem)) {
                $this->Flash->success(__('The problem has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The problem could not be saved. Please, try again.'));
            }
        }
        $parentProblems = $this->Problems->find('treeList');
        $this->set(compact('problem', 'categories', 'parentProblems'));
        $this->set('_serialize', ['problem']);
    }

    public function isAuthorized($user = null)
    {
        // All registered users can add articles
        if ($this->request->action === 'edit' && empty($this->request->params['pass']) ) {
            return true;
        }

        // The owner of an article can edit and delete it
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $problemId = (int)$this->request->params['pass'][0];
            if ($this->Problems->isOwnedBy($problemId, $user['id'])) {
                return true;
            } else if ($user['id'] == 1) {
                return $this->redirect(['prefix' => 'admin', 'action' => 'edit', $problemId]);
            }
        }

        return parent::isAuthorized($user);
    }
}
