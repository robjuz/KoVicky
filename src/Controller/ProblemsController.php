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
    {
        $this->Auth->allow(['index', 'view']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //show only the main problems
        $problems = $this->Problems->find('all')
                ->where([
                    'is_active' => true,
                    'is_main_problem' => true
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
            'contain' => ['ParentProblems','RelatedProblems', 'Mediafiles', 'Users']
        ]);

        $this->set('problem', $problem);
        $this->set('_serialize', ['problem']);

        $this->set('isAllowedToEdit',$this->isAllowedToEdit($id,$this->Auth->user('id')));
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
                'contain' => ['Mediafiles', 'RelatedProblems', 'Tags']
            ]);
        } else {
            $problem = $this->Problems->newEntity();
            $problem->user_id = $this->Auth->user('id');
            $this->Problems->save($problem);
            return $this->redirect(['action' => 'edit', $problem->id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $problem = $this->Problems->patchEntity($problem, $this->request->data);
            $problem->user_id = $this->Auth->user('id');
            $problem->is_active = true;
            if ($this->Problems->save($problem)) {
                $this->Flash->success(__('The problem has been saved.'));
                return $this->redirect(['action' => 'view', $problem->id]);
            } else {
                $this->Flash->error(__('The problem could not be saved. Please, try again.'));
            }
        }
        $problems = $this->Problems->find('list')->where(['is_active' => true]);
        $tags = $this->Problems->Tags->find('list',[
            'valueField' => 'title'
            ]);
        $this->set(compact('problem', 'problems', 'tags'));
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
            } else if ($this->isAdmin()) {
                return $this->redirect(['prefix' => 'admin', 'action' => 'edit', $problemId]);
            }
        }

        return parent::isAuthorized($user);
    }

    public function isAllowedToEdit($problemId = 0, $userId = 0) {
        return (bool) $this->Problems->isOwnedBy($problemId, $userId) OR $this->isAdmin();
    }
}
