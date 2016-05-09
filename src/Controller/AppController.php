<?php

namespace KoVicky\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;

class AppController extends BaseController
{
    public $helpers = [
        'Html' => [
            'className' => 'Bootstrap.BootstrapHtml'
        ],
        'Form' => [
            'className' => 'Bootstrap.BootstrapForm',
             'useCustomFileInput' => true
        ],
        'Paginator' => [
            'className' => 'Bootstrap.BootstrapPaginator'
        ],
        'Modal' => [
            'className' => 'Bootstrap.BootstrapModal'
        ]
    ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        if (isset($event->subject()->request->params['prefix']) and ($event->subject()->request->params['prefix'] === 'admin')) {
            $this->viewBuilder()->layout('admin-default');
        }
    }
}
