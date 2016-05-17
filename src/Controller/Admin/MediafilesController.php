<?php
namespace KoVicky\Controller\Admin;

use KoVicky\Controller\AppController;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;

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

        $imagine = new Imagine();
        $size    = new Box(800, 500);
        $mode    = ImageInterface::THUMBNAIL_INSET; // or \ImageInterface::THUMBNAIL_OUTBOUND;

        $imagine->open($data['tmp_name'])
            ->thumbnail($size, $mode)
            ->save(WWW_ROOT.$file->file_url);
        
        if(file_exists(WWW_ROOT.$file->file_url)){
            $this->Mediafiles->save($file);
            $this->set('file', $file);
            $this->set('_serialize',['file']);

            $toDelete = $this->Mediafiles->find('all')
                ->where([
                    'media_type' => 'header',
                    'problem_id' => $id,
                    'id != ' => $file->id
                ]);
            foreach ($toDelete as $dFile) {
                if (is_file(WWW_ROOT.$dFile->file_url)){
                    unlink(WWW_ROOT.$dFile->file_url);    
                }
                $this->Mediafiles->delete($dFile);
            }
        }

    }

    public function thumb()  {
        $this->autoRender = false ;
        $data = $this->request->data;

        $x = isset($data['x']) ? $data['x'] : 0;
        $y = isset($data['y']) ? $data['y'] : 0;
        $w = isset($data['w']) ? $data['w'] : 0;
        $h = isset($data['h']) ? $data['h'] : 0;

        if ($w > 0 AND $h > 0){
            $imagine    = new Imagine();
            $point      = new Point($x,$y);
            $box        = new Box($w, $h);
            $mode       = ImageInterface::THUMBNAIL_OUTBOUND;

            $file = (WWW_ROOT.$data['image']);
            $imagine->open($file)
                ->crop($point, $box)
                ->save($file);
        }
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
