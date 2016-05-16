<?php
namespace KoVicky\Controller\Admin;

use KoVicky\Controller\AppController;

/**
 * Mediafiles Controller
 *
 * @property \App\Model\Table\MediafilesTable $Mediafiles
 */
class MediafilesController extends AppController
{

    public function upload($type = null,$id = null) {
        
        $file = $this->Mediafiles->newEntity();
        $data = $this->request->data['file'];

        $file->file_name = $data['name'];
        $file->file_url = "/uploads/".time().'-'.$data['name'];
        $file->problem_id = $id;
        $file->media_type = $type;

        $imagine = new \Imagine\Gd\Imagine();
        $size    = new \Imagine\Image\Box(800, 600);
        $mode    = \Imagine\Image\ImageInterface::THUMBNAIL_INSET; // or \ImageInterface::THUMBNAIL_OUTBOUND;

        $imagine->open($data['tmp_name'])
            ->thumbnail($size, $mode)
            ->save(WWW_ROOT.$file->file_url);
        
        if(file_exists(WWW_ROOT.$file->file_url)){
            $this->Mediafiles->save($file);
        }
    }

    public function thumb()  {
        $data = $this->request->data;
        $imagine = new \Imagine\Gd\Imagine();
        $point   = new \Imagine\Image\Point($data['x'],$data['y']);
        $box    = new \Imagine\Image\Box($data['w'],$data['h']);
        $mode    = \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND;

        $imagine->open(WWW_ROOT.$data['image'])
            ->crop($point, $box)
            ->save(WWW_ROOT.'/uploads/test.jpg');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Problems']
        ];
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
            'contain' => ['Problems']
        ]);

        $this->set('mediafile', $mediafile);
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
        if ($id != null) {
            $mediafile = $this->Mediafiles->get($id, [
                'contain' => []
            ]);
        } else {
            $mediafile = $this->Mediafiles->newEntity();
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mediafile = $this->Mediafiles->patchEntity($mediafile, $this->request->data);
            if ($this->Mediafiles->save($mediafile)) {
                $this->Flash->success(__('The mediafile has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mediafile could not be saved. Please, try again.'));
            }
        }
        $problems = $this->Mediafiles->Problems->find('list');
        $this->set(compact('mediafile', 'problems'));
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
