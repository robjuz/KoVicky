<?php
namespace KoVicky\Controller\Admin;

use KoVicky\Controller\AppController;
use Cake\Core\Exception\Exception;

/**
 * Mediafiles Controller
 *
 * @property \App\Model\Table\MediafilesTable $Mediafiles
 */
class MediafilesController extends AppController
{

    public function upload($type = 'default',$id = null) 
    {
        $this->response->type('application/json');

        $data = $this->request->data['file'];

        $file = $this->Mediafiles->newEntity();
        
        $file->file_name    = $data['name'];
        $file->media_type   = $type;
        $file->file_url     = "/uploads/".time().'-'.$type.'-'.$data['name'];
        $file->problem_id   = $id;
        
        if(is_uploaded_file($data['tmp_name'])) {
            move_uploaded_file($data['tmp_name'],WWW_ROOT.$file->file_url);
        }

        if(file_exists(WWW_ROOT.$file->file_url)){
            $this->Mediafiles->save($file);
            $this->set('file', $file);
            $this->set('_serialize',['file']);
        } else {
            throw new Exception("File could not be saved. (File-System)");
        }
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
        return $this->redirect($this->referer());
    }

    public function isAuthorized($user = null)
    {
        // All registered users can upload files
        if ($this->request->action === 'upload') {
            return true;
        }

        return parent::isAuthorized($user);
    }
}
