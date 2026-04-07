📝 UPDS TaskManager - Docker Edition

Este proyecto es un sistema de gestión multilingüe desarrollado en CakePHP 4.x. Se ha "dockerizado" para garantizar una implementación rápida y sin errores de configuración en cualquier entorno.

 Despliegue de Aplicación CakePHP con Podman
📌 Descripción
Este proyecto consiste en la contenerización de una aplicación web desarrollada en CakePHP , utilizando Podman como motor de contenedores.

Se creó una imagen personalizada basada en PHP con Apache, configurando las extensiones necesarias para el correcto funcionamiento del sistema, y ​​se orquestó mediante podman-compose.

⚙️ Tecnologías utilizadas

PHP 8.2 + Apache
CakePHP
Podman
Podman Compose
Linux


📁 Estructura del proyecto
devops/
├── Dockerfile
├── compose.yml
└── app_ef/   # Aplicación CakePHP


🚀 Pasos de implementación

1️⃣ Crear carpeta de trabajo
mkdir ~/devops/
cd ~/devops/
📌 ¿Qué hace? Crea una carpeta llamada devopsy entra en ella para trabajar.


2️⃣ Colocar la aplicación
Copiar o clonar el proyecto dentro de la carpeta:

app_ef/
📌 ¿Qué hace? Contiene todo el código fuente de la aplicación CakePHP.


3️⃣ Crear el Dockerfile
FROM php:8.2-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    libicu-dev \
    && docker-php-ext-install intl pdo pdo_mysql mysqli

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar aplicación
COPY app_ef/ /var/www/html/

# Permisos
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Puerto
EXPOSE 80
📌 ¿Qué hace? Defina cómo se construye la imagen:

Usa PHP con Apache
Instale las extensiones necesarias ( intl, pdo_mysql, etc.)
Copia la aplicación al contenedor
Configurar permisos


4️⃣ Crear compose.yml
services:
  php-app:
    image: ef-app
    container_name: ef-app
    ports:
      - "8080:80"
    restart: unless-stopped
📌 ¿Qué hace? Defina cómo se ejecuta el contenedor:

Usa la imagen creada ( ef-app)
Expone el puerto 8080
Mantiene el contenedor activo


5️⃣ Configuración de rojo (opcional)
sudo mousepad /etc/containers/containers.conf
Agregar:

[engine]
network_cmd = "host"
📌 ¿Qué hace? Permite que Podman utilice la red del host, evitando problemas de conexión.


6️⃣ Construir la imagen
podman build -t ef-app .
📌 ¿Qué hace? Crea una imagen llamada ef-appdesde el Dockerfile.


7️⃣ Verificar imágenes
podman images
📌 ¿Qué hace? Muestra las imágenes disponibles en el sistema.


8️⃣ Ejecutar contenedor
podman-compose up
📌 ¿Qué hace? Levante el contenedor definido en compose.yml.


9️⃣ Acceder a la aplicación
http://localhost:8080
📌 ¿Qué hace? Permite acceder a la aplicación desde el navegador.

🔍 Comandos útiles
Ver puertos en uso
sudo ss -tuln
📌 Muestra los puertos ocupados en el sistema.


Ver contenedores activos
podman ps
📌 Lista los contenedores en ejecución.


Ver registros del contenedor
podman logs ef-app
📌 errores Muestra o información del contenedor.


🛠 Problemas solucionados

❌ Error en COPY (ruta incorrecta) ✔ Se corrigió el nombre de la carpeta ( app_ef)

❌ Falta de extensión intl ✔ Se instaló condocker-php-ext-install

❌ Error de conexión MySQL ✔ Se agregó pdo_mysqlymysqli

❌ Error de imagen inexistente ✔ Se ejecutópodman build

✅ Resultado final
Aplicación funcionando en contenedor
Acceso vía navegador
Entorno reproducible
Configuración portable


🌍 Internacionalización (i18n)

El sistema soporta 11 idiomas. La lógica de traducción se gestiona mediante archivos de recursos localizados:
Idioma	Código	Ruta del Recurso
Español	es_ES	resources/locales/es_ES/default.po
Inglés	en_US	resources/locales/en_US/default.po
Portugués	pt_BR	resources/locales/pt_BR/default.po
Ruso	ru_RU	resources/locales/ru_RU/default.po
Chino	zh_CN	resources/locales/zh_CN/default.po

    

📸 Vista Previa
Gestión de Tareas Multilingüe
### 1. Pantalla de Inicio de Sesión (Seguridad Manual)
![Inicio de Sesión](screenshots/login.png)
*Formulario de autenticación protegido mediante sesiones manuales en el controlador.*


### 2. Gestión de Plantas (Catálogo Botánico)
![Listado de Plantas](screenshots/plantas.png)
*Tabla responsiva con Bootstrap 5, mostrando el CRUD de plantas.*

### 3. Gestión de Tareas (Filtros y Estados)
![Listado de Tareas](screenshots/tareas.png)
*Tabla de actividades con filtros dinámicos por título y estado, incluyendo fecha límite.*

### 4. Administración de Usuarios (Control de Acceso)
![Gestión de Usuarios](screenshots/user.png)
*Panel de control para gestionar usuarios del sistema y asignar sus idiomas preferidos.*


Detalle botánico con información técnica y visualización responsiva.
⚙️ Comandos Útiles


Si necesitas entrar al contenedor para ejecutar comandos de CakePHP (como migraciones):
Bash


# Entrar a la terminal del contenedor de la app
docker exec -it upds_app_container bash


# Limpiar caché de CakePHP dentro del contenedor
bin/cake cache clear_all


👤 Autor

    Alexandra Ibañez
    Estudiante de Ing. de sistemas
