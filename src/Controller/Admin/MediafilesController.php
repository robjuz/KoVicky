<?php
namespace KoVicky\Controller\Admin;

use KoVicky\Controller\AppController;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;
use Cake\Core\Exception\Exception;

/**
 * Mediafiles Controller
 *
 * @property \App\Model\Table\MediafilesTable $Mediafiles
 */
class MediafilesController extends AppController
{

    public function upload($type = null,$id = null) 
    {
        $file = $this->Mediafiles->newEntity();
        $data = $this->request->data['file'];

        $file->file_name = $data['name'];
        $file->file_url = "/uploads/".time().'_'.$type.'_';
        $file->problem_id = $id;
        $file->media_type = $type;
        move_uploaded_file($data['tmp_name'],WWW_ROOT.$file->file_url);

        switch ($type) {
            case 'header':
                self::upload_header($file);
                break;
            case 'thumb':
                self::upload_thumb($file);
                break;
            case 'attachment':
                break;
            default:
                unlink($file->file_url);
                throw new Exception("Wrong media_type!");
                break;
        } 

        if(file_exists(WWW_ROOT.$file->file_url)){
            $this->Mediafiles->save($file);
            $this->set('file', $file);
            $this->set('_serialize',['file']);
        } else {
            throw new Exception("File could not be saved");
        }

    }

    private function upload_header($file = null) 
    {
        $imagine = new Imagine();
        $size    = new Box(800, 500);
        $mode    = ImageInterface::THUMBNAIL_INSET; // or \ImageInterface::THUMBNAIL_OUTBOUND;
        $fileUlr = WWW_ROOT.$file->file_url;

        $imagine->open($fileUlr)
            ->thumbnail($size, $mode)
            ->save($fileUlr);

        $toDelete = $this->Mediafiles->find('all')
                ->where([
                    'media_type' => 'header',
                    'problem_id' => $file->problem_id,
                    'id != ' => $file->id
                ]);
        foreach ($toDelete as $dFile){
            if (is_file(WWW_ROOT.$dFile->file_url)){
                unlink(WWW_ROOT.$dFile->file_url);    
            }
            $this->Mediafiles->delete($dFile);
        }
    }

    private function upload_thumb($file = null)  
    {
        $data = $this->request->data['file'];
        debug($this->request->data);

        $x = isset($data['x']) ? $data['x'] : 0;
        $y = isset($data['y']) ? $data['y'] : 0;
        $w = isset($data['w']) ? $data['w'] : 0;
        $h = isset($data['h']) ? $data['h'] : 0;

        if ($w > 0 AND $h > 0){
            $imagine    = new Imagine();
            $point      = new Point($x,$y);
            $box        = new Box($w, $h);
            $mode       = ImageInterface::THUMBNAIL_OUTBOUND;

            $fileUrl = $file->file_url;
            $imagine->open($fileUrl)
                ->crop($point, $box)
                ->save($fileUrl);
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
