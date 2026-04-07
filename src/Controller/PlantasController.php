<?php
declare(strict_types=1);

namespace App\Controller;

class PlantasController extends AppController
{
    /**
     * El index y el view suelen ser públicos para que los visitantes
     * vean el catálogo, así que no les pondremos restricción de login.
     */
    public function index()
    {
        $plantas = $this->paginate($this->Plantas);
        $this->set(compact('plantas'));
    }

    public function view($id = null)
    {
        $planta = $this->Plantas->get($id);
        $this->set(compact('planta'));
    }

    /**
     * Método para editar: Solo usuarios logueados.
     */
    public function edit($id = null)
    {
        // VERIFICACIÓN MANUAL DE SESIÓN
        if (!$this->request->getSession()->check('Auth.User')) {
            $this->Flash->error(__('Debes iniciar sesión para editar plantas.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $planta = $this->Plantas->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $planta = $this->Plantas->patchEntity($planta, $this->request->getData());
            if ($this->Plantas->save($planta)) {
                $this->Flash->success(__('Planta actualizada correctamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar. Intenta de nuevo.'));
        }
        $this->set(compact('planta'));
    }

    /**
     * Método para eliminar: Solo usuarios logueados.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        // VERIFICACIÓN MANUAL DE SESIÓN
        if (!$this->request->getSession()->check('Auth.User')) {
            $this->Flash->error(__('Acceso denegado. Por favor inicia sesión.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $planta = $this->Plantas->get($id);
        if ($this->Plantas->delete($planta)) {
            $this->Flash->success(__('La planta ha sido eliminada.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar la planta.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}