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
            'contain' => ['Categories','ParentProblems', 'ChildProblems' => ['ParentProblems']]
        ];
        $problems = $this->paginate($this->Problems);

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
            'contain' => ['Categories', 'Solutions']
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
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $problem = $this->Problems->patchEntity($problem, $this->request->data);
            if ($this->Problems->save($problem)) {
                $this->Flash->success(__('The problem has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The problem could not be saved. Please, try again.'));
            }
        }
        $parentProblems = $this->Problems->find('treeList');
        $categories = $this->Problems->Categories->find('treeList');
        $this->set(compact('problem', 'categories', 'parentProblems'));
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

    public function saveImage() {
        $this->autoRender = false ;
        define('UPLOAD_DIR','/uploads/');
        $img = $_POST['imgUrl'];

        if (strpos($img, 'jpeg') !== false) {
            $img = str_replace('data:image/jpeg;base64,', '', $img);
            $file = UPLOAD_DIR . time().'.jpeg';
        } else {
            $response = Array(
                "status" => 'error',
                "message" => 'Only jpeg are supported for now'
            );
            print json_encode($response);
            return;
        }
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        
        
        $success = file_put_contents( WWW_ROOT.$file, $data);
        if ($success){
            $imgInitW = $_POST['imgInitW'];
            $imgInitH = $_POST['imgInitH'];
            // resized sizes
            $imgW = $_POST['imgW'];
            $imgH = $_POST['imgH'];
            // offsets
            $imgY1 = $_POST['imgY1'];
            $imgX1 = $_POST['imgX1'];
            // crop box
            $cropW = $_POST['cropW'];
            $cropH = $_POST['cropH'];
            // rotation angle
            $angle = $_POST['rotation'];

            $jpeg_quality = 100;

             // resize the original image to size of editor
            $resizedImage = imagecreatetruecolor($imgW, $imgH);
            imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, $imgH, $imgInitW, $imgInitH);
            // rotate the rezized image
            $rotated_image = imagerotate($resizedImage, -$angle, 0);
            // find new width & height of rotated image
            $rotated_width = imagesx($rotated_image);
            $rotated_height = imagesy($rotated_image);
            // diff between rotated & original sizes
            $dx = $rotated_width - $imgW;
            $dy = $rotated_height - $imgH;
            // crop rotated image to fit into original rezized rectangle
            $cropped_rotated_image = imagecreatetruecolor($imgW, $imgH);
            imagecolortransparent($cropped_rotated_image, imagecolorallocate($cropped_rotated_image, 0, 0, 0));
            imagecopyresampled($cropped_rotated_image, $rotated_image, 0, 0, $dx / 2, $dy / 2, $imgW, $imgH, $imgW, $imgH);
            // crop image into selected area
            $final_image = imagecreatetruecolor($cropW, $cropH);
            imagecolortransparent($final_image, imagecolorallocate($final_image, 0, 0, 0));
            imagecopyresampled($final_image, $cropped_rotated_image, 0, 0, $imgX1, $imgY1, $cropW, $cropH, $cropW, $cropH);
            imagejpeg($final_image, WWW_ROOT.$file, $jpeg_quality);

            $response = Array(
                "status" => 'success',
                "url" => $file
            );
        } else {
             $response = Array(
                "status" => 'error',
                "message" => 'Unable to save the file'
            );
        }
        print json_encode($response);
    }
}
