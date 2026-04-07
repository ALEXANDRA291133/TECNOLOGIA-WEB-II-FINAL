📝 UPDS TaskManager: Gestión de Tareas Multilingüe

Descripción del Proyecto

Este sistema es una solución web para la gestión de tareas personales que prioriza la inclusión lingüística y cultural.
Permite a cada usuario administrar sus actividades en un entorno adaptado a su idioma preferido, cumpliendo con los requisitos socioformativos de la materia Tecnología Web II.

🛠️ Stack Tecnológico

* Framework: CakePHP 5.x (Arquitectura MVC).
* Lenguaje: PHP 8.4.Base de Datos: MariaDB.
* Infraestructura: Despliegue mediante contenedores Podman en entorno Linux.
* Frontend: Bootstrap 5 para un diseño responsivo y adaptativo.


🚀 Instalación y Despliegue con Podman

* El proyecto está diseñado para ejecutarse de forma aislada y reproducible utilizando un stack de contenedores para facilitar su puesta en marcha en cualquier entorno.

1. Requisitos

* Podman y Podman-compose instalados.
* Puerto 8080 disponible en el equipo host.

2. Estructura de Directorios

* Para que el montaje de volúmenes funcione correctamente, la estructura de archivos debe ser la siguiente:
  
Plaintext/home/live/podman/devops/

├── compose.yml       # Configuración de servicios (App y DB)

├── Dockerfile        # Imagen personalizada PHP 8.2 + Apache

└── html/             # Código fuente mapeado al contenedor
    └── app_ef/       # Carpeta principal de CakePHP
    
4. Comandos de Ejecución

Desde la terminal en la carpeta devops, ejecuta:

Bash# Construir la imagen y levantar los servicios

podman-compose up -d --build


Acceso al sistema: http://localhost:8085/app_ef.

🌍 Funcionalidades de Internacionalización (i18n)

El sistema implementa mecanismos de internacionalización para soportar múltiples idiomas en la interfaz:
Selector de Idiomas:

* Menú dinámico para cambiar entre 11 idiomas (ES, EN, PT, FR, DE, RU, ZH, JA, KO, AR, HI).
  
* Persistencia: El idioma se guarda en el perfil del usuario y en la sesión.
  
* Descripciones Bilingües: Soporte para títulos y descripciones en diferentes lenguas simultáneamente.

* Recursos: Uso de archivos .po localizados en resources/locales/.



📸 Vista Previa del Sistema

* Módulo                                                                         *Funcionalidad
Gestión de Tareas                                                                 CRUD completo con filtros por estado y buscador de títulos.
Edición Localizada                                                                Formulario con pestañas para ingresar descripciones en varios idiomas.
Fichas Técnicas                                                                   Vista de detalle organizada para contenidos extensos y bilingües.
Catálogo de Plantas                                                               Módulo de gestión botánica integrado con el sistema de seguridad.


🤖 Bitácora de Inteligencia Artificial

En cumplimiento con el modelo educativo UPDS, se utilizó IA como apoyo estratégico en:

* Optimización DevOps: Creación del Dockerfile y resolución de conflictos de permisos en carpetas tmp/ y logs/.
* Lógica de Traducción: Generación de archivos de recursos para idiomas con alfabetos no latinos.
* Refactorización: Mejora de la seguridad en el AppController para el manejo de sesiones multilingües.
* Las sugerencias de la IA fueron evaluadas y modificadas críticamente antes de su implementación.


👤 Información del Proyecto
* Autor: Alexandra Ibañez
