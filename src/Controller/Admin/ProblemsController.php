<?php
namespace KoVicky\Controller\Admin;

use KoVicky\Controller\AppController;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;

/**
 * Problems Controller
 *
 * @property \App\Model\Table\ProblemsTable $Problems
 */
class ProblemsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'RelatedProblems']
        ];
        $problems = $this->paginate($this->Problems);

        $this->set(compact('problems'));
        $this->set('_serialize', ['problems']);
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
                'contain' => ['Mediafiles', 'Users','RelatedProblems']
            ]);
        } else {
            $problem = $this->Problems->newEntity();
            $this->Problems->save($problem);
            return $this->redirect(['action' => 'edit', $problem->id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $problem = $this->Problems->patchEntity($problem, $this->request->data);

            $problem->is_active = true;
            if ($this->Problems->save($problem)) {
                $this->Flash->success(__('The problem has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The problem could not be saved. Please, try again.'));
            }
        }
        $problems = $this->Problems->find('list')->where('is_active', true);
        $users = $this->Problems->Users->find('list',[
            'valueField' => 'username'
            ]);
        $this->set(compact('problem', 'users', 'problems'));
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

     public function upload($id = null) 
    {
        $this->response->type('application/json');

        $imagine = new Imagine();
        $size    = new Box(800, 500);
        $mode    = ImageInterface::THUMBNAIL_INSET;
        
        $data = $this->request->data['file'];

        $problem = $this->Problems->get($id);
        $problem->image = 'problem_'.time().'_'.$data['name'];
        $problem->thumb = 'problem_'.time().'_'.$data['name'];
        $this->Problems->save($problem);

        $imagine->open($data['tmp_name'])
            ->thumbnail($size, $mode)
            ->save(WWW_ROOT.'/uploads/'.$problem->image);

        $this->set( compact('problem') );
        $this->set('_serialize', ['problem']);
    }

    public function makeThumb($id = null)  
    {
        $this->response->type('application/json');
        $data = $this->request->data;

        $x = isset($data['x']) ? $data['x'] : 0;
        $y = isset($data['y']) ? $data['y'] : 0;
        $w = isset($data['w']) ? $data['w'] : 0;
        $h = isset($data['h']) ? $data['h'] : 0;

        $problem = $this->Problems->get($id);
        $problem->thumb = 't_'.$problem->image;

        if ($w > 0 AND $h > 0 AND ($problem->image !== '../ko_vicky/img/default_thumb.jpg')){
            $imagine    = new Imagine();
            $point      = new Point($x,$y);
            $box        = new Box($w, $h);
            $mode       = ImageInterface::THUMBNAIL_OUTBOUND;
            $imagine->open(WWW_ROOT.'/uploads/'.$problem->image)
                ->crop($point, $box)
                ->save(WWW_ROOT.'/uploads/'.$problem->thumb);
        }

        $this->Problems->save($problem);

        $this->set( compact('problem') );
        $this->set('_serialize', ['problem']);
    }

    public function isAuthorized($user = null)
    {
        // All registered users can upload images and make thumbs
        if ($this->request->action === 'upload' OR $this->request->action === 'make-thumb') {
            return true;
        }

        return parent::isAuthorized($user);
    }
}
