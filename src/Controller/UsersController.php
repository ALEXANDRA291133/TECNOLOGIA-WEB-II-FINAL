<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class UsersController extends AppController
{
    /**
     * Login manual mediante sesiones
     */
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $session = $this->request->getSession();

        // Si ya hay una sesión activa, mandarlo a Plantas
        if ($session->check('Auth.User')) {
            return $this->redirect(['controller' => 'Plantas', 'action' => 'index']);
        }

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            
            // Buscamos al usuario en la base de datos
            $user = $this->Users->find()
                ->where([
                    'correo' => $data['correo'], 
                    'password' => $data['password'] // En texto plano para tu examen
                ])
                ->first();

            if ($user) {
                // Escribimos los datos del usuario en la sesión manualmente
                $session->write('Auth.User', $user->toArray());
                $this->Flash->success(__('Bienvenido al sistema.'));
                
                return $this->redirect(['controller' => 'Plantas', 'action' => 'index']);
            }

            $this->Flash->error(__('Correo o contraseña incorrectos.'));
        }
    }

    /**
     * Logout manual
     */
    public function logout()
    {
        // Destruimos la sesión y redirigimos al login
        $this->request->getSession()->destroy();
        $this->Flash->success(__('Sesión cerrada correctamente.'));
        
        return $this->redirect(['action' => 'login']);
    }

    public function index()
    {
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario registrado. Ahora puedes iniciar sesión.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('No se pudo registrar el usuario.'));
        }
        $this->set(compact('user'));
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Perfil actualizado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error al actualizar.'));
        }
        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuario eliminado.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}