<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\I18n\I18n; // Importamos esto para que el código sea más limpio

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        
        // 1. GESTIÓN DE IDIOMA
        $session = $this->getRequest()->getSession();
        // Si no hay idioma en sesión, intentamos detectar el del navegador o usamos español
        $lang = $session->read('Config.language') ?? 'es_ES';
        
        I18n::setLocale($lang);

        // 2. HACER DISPONIBLE EL USUARIO EN TODAS LAS VISTAS
        // Esto evita tener que leer la sesión en cada archivo .php de la carpeta templates
        $this->set('authUser', $session->read('Auth.User'));
    }

    /**
     * Función para cambiar el idioma desde cualquier parte del sitio
     */
    public function changeLanguage($lang = null)
    {
        if ($lang) {
            // Guardamos en la sesión para que persista al navegar
            $this->getRequest()->getSession()->write('Config.language', $lang);
        }
        // Regresa a la página donde estaba el usuario
        return $this->redirect($this->referer());
    }
}