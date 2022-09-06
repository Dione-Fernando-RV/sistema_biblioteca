<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $prefix = $this->request->getParam('prefix');
        $authError = 'Você realmente acha que tem permissão para ver isso?';
        $authConfig = [
            'authError' => $authError,
            'loginAction' => [
                'controller' => 'Auth',
                'action' => 'login',
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'senha'],
                    'userModel' => 'Usuarios'
                ]
            ],
        ];

        if($prefix === 'Admin') {
            $this->loadComponent('Auth', array_merge($authConfig, [
                'storage' => [
                    'className' => 'Session',
                    'key' => 'Auth.Admin',
                ],
                'loginRedirect' => [
                    'prefix' => 'Admin',
                    'controller' => 'Cursos',
                    'action' => 'index',
                ],
            ]));
        }elseif ($prefix === 'Aluno') {
            $this->loadComponent('Auth', array_merge($authConfig, [
                'storage' => [
                    'className' => 'Session',
                    'key' => 'Auth.Aluno',
                ],
                'loginRedirect' => [
                    'prefix' => 'Aluno',
                    'controller' => 'Dashboard',
                    'action' => 'index',
                ],
            ]));
        }

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function isAuthorized($user = null)
    {
        $prefix = $this->request->getParam('prefix');

        if (!$prefix) {
            return true;
        }

        if ($prefix === 'Admin') {
            return (bool)($user['grupo_usuario_id'] === 1);
        }elseif ($prefix === 'Aluno') {
            return (bool)($user['grupo_usuario_id'] === 2);
        }

        return false;
    }

    public function beforeFilter(EventInterface $event) {
        $prefix = $this->request->getParam('prefix');
        $user = null;

        if($prefix === 'Admin') {
            $this->Auth->sessionKey='Auth.Admin';
            $user = $this->Auth->user();
        }elseif($prefix === 'Aluno') {
            $this->Auth->sessionKey='Auth.Aluno';
            $user = $this->Auth->user();
        }

        $this->set(compact('user'));
    }

    public function beforeRender(EventInterface  $event) {
        $prefix = $this->request->getParam('prefix');

        if($prefix === 'Admin' || $prefix === 'Aluno') {
            $this->viewBuilder()->setTheme('AdminLTE');
            $this->viewBuilder()->setClassName('AdminLTE.AdminLTE');
        }

        $base_url = Router::url('/', true);;

        $this->set(compact('base_url'));
    }
}