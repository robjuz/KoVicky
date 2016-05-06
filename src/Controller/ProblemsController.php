<?php
namespace KoVicky\Controller;

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
        $problems = $this->Problems->find('all', ['limit' => 10]);

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
            'contain' => ['Categories', 'Solutions' => ['Mediafiles']]
        ]);

        $this->set('problem', $problem);
        $this->set('_serialize', ['problem']);
    }
}
