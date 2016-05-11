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
        //show only the 6 main problems
        $problems = $this->Problems->find('all')
                ->where(['parent_id is NULL']);

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
}
