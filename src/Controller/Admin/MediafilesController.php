<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Mediafiles Controller
 *
 * @property \App\Model\Table\MediafilesTable $Mediafiles
 */
class MediafilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $mediafiles = $this->paginate($this->Mediafiles);

        $this->set(compact('mediafiles'));
        $this->set('_serialize', ['mediafiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Mediafile id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mediafile = $this->Mediafiles->get($id, [
            'contain' => []
        ]);

        $this->set('mediafile', $mediafile);
        $this->set('_serialize', ['mediafile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mediafile = $this->Mediafiles->newEntity();
        if ($this->request->is('post')) {
            $mediafile = $this->Mediafiles->patchEntity($mediafile, $this->request->data);
            if ($this->Mediafiles->save($mediafile)) {
                $this->Flash->success(__('The mediafile has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mediafile could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mediafile'));
        $this->set('_serialize', ['mediafile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mediafile id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mediafile = $this->Mediafiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mediafile = $this->Mediafiles->patchEntity($mediafile, $this->request->data);
            if ($this->Mediafiles->save($mediafile)) {
                $this->Flash->success(__('The mediafile has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mediafile could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mediafile'));
        $this->set('_serialize', ['mediafile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mediafile id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mediafile = $this->Mediafiles->get($id);
        if ($this->Mediafiles->delete($mediafile)) {
            $this->Flash->success(__('The mediafile has been deleted.'));
        } else {
            $this->Flash->error(__('The mediafile could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
