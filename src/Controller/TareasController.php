<?php
declare(strict_types=1);

namespace App\Controller;

class TareasController extends AppController
{
    /**
     * Index method: Lista las tareas filtradas por el usuario de la sesión.
     */
    public function index()
    {
        // LEER SESIÓN MANUAL: Ya no usamos getAttribute('identity')
        $user = $this->request->getSession()->read('Auth.User');

        // Seguridad: Si no hay sesión, redirigir al login
        if (!$user) {
            $this->Flash->error(__('Debes iniciar sesión para ver tus tareas.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        // Usamos el ID de la sesión ($user['id']) para filtrar
        $query = $this->Tareas->find()->where(['user_id' => $user['id']]);

        // Buscador
        $search = $this->request->getQuery('q');
        if (!empty($search)) {
            $query->where(['titulo LIKE' => '%' . $search . '%']);
        }

        $estado = $this->request->getQuery('estado');
        if (!empty($estado)) {
            $query->where(['estado' => $estado]);
        }

        $tareas = $this->paginate($query);
        $this->set(compact('tareas'));
    }

    /**
     * View method
     */
    public function view($id = null)
    {
        $user = $this->request->getSession()->read('Auth.User');
        $tarea = $this->Tareas->get($id);

        // Seguridad: Verificar dueño de la tarea
        if (!$user || $tarea->user_id !== $user['id']) {
            $this->Flash->error(__('No tienes permiso para ver esta tarea.'));
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('tarea'));
    }

    /**
     * Add method
     */
    public function add()
    {
        $user = $this->request->getSession()->read('Auth.User');
        if (!$user) {
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $tarea = $this->Tareas->newEmptyEntity();
        if ($this->request->is('post')) {
            $tarea = $this->Tareas->patchEntity($tarea, $this->request->getData());
            
            // Asignación manual del ID del usuario logueado
            $tarea->user_id = $user['id'];

            if ($this->Tareas->save($tarea)) {
                $this->Flash->success(__('La tarea ha sido guardada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar la tarea.'));
        }
        $this->set(compact('tarea'));
    }

    /**
     * Edit method
     */
    public function edit($id = null)
    {
        $user = $this->request->getSession()->read('Auth.User');
        $tarea = $this->Tareas->get($id);

        if (!$user || $tarea->user_id !== $user['id']) {
            $this->Flash->error(__('Acceso denegado.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $tarea = $this->Tareas->patchEntity($tarea, $this->request->getData());
            if ($this->Tareas->save($tarea)) {
                $this->Flash->success(__('La tarea ha sido actualizada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error al actualizar.'));
        }
        $this->set(compact('tarea'));
    }

    /**
     * Delete method
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->request->getSession()->read('Auth.User');
        $tarea = $this->Tareas->get($id);

        if ($user && $tarea->user_id === $user['id']) {
            if ($this->Tareas->delete($tarea)) {
                $this->Flash->success(__('Tarea eliminada.'));
            } else {
                $this->Flash->error(__('Error al eliminar.'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }
}