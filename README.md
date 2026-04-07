---
📝 UPDS TaskManager: Gestión de Tareas Multilingüe
---

Descripción del Proyecto
Este sistema es una solución web para la gestión de tareas personales que prioriza la inclusión lingüística y cultural.
Permite a cada usuario administrar sus actividades en un entorno adaptado a su idioma preferido, cumpliendo con los requisitos socioformativos de la materia Tecnología Web II.



---
🛠️ Stack Tecnológico
---

* Framework: CakePHP 5.x (Arquitectura MVC).
* Lenguaje: PHP 8.4.Base de Datos: MariaDB.
* Infraestructura: Despliegue mediante contenedores Podman en entorno Linux.
* Frontend: Bootstrap 5 para un diseño responsivo y adaptativo.
---

##🚀 Instalación y Despliegue con Podman

* El proyecto está diseñado para ejecutarse de forma aislada y reproducible utilizando un stack de contenedores para facilitar su puesta en marcha en cualquier entorno.
---
1. Requisitos

* Podman y Podman-compose instalados.
* Puerto 8080 disponible en el equipo host.
---

## 📁 Estructura del proyecto

```
devops/
├── Dockerfile
├── compose.yml
└── app_ef/   # Aplicación CakePHP
```

---

## 🚀 Pasos de implementación

### 1️⃣ Crear carpeta de trabajo

```bash
mkdir ~/devops/
cd ~/devops/
```

📌 **¿Qué hace?**
Crea una carpeta llamada `devops` y entra en ella para trabajar.

---

### 2️⃣ Colocar la aplicación

Copiar o clonar el proyecto dentro de la carpeta:

```
app_ef/
```

📌 **¿Qué hace?**
Contiene todo el código fuente de la aplicación CakePHP.

---

### 3️⃣ Crear el Dockerfile

```dockerfile
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
```

📌 **¿Qué hace?**
Define cómo se construye la imagen:

* Usa PHP con Apache
* Instala extensiones necesarias (`intl`, `pdo_mysql`, etc.)
* Copia la aplicación al contenedor
* Configura permisos

### 4️⃣ Crear compose.yml

```yaml
services:
  php-app:
    image: ef-app
    container_name: ef-app
    ports:
      - "8080:80"
    restart: unless-stopped
```

📌 **¿Qué hace?**
Define cómo se ejecuta el contenedor:

* Usa la imagen creada (`ef-app`)
* Expone el puerto 8080
* Mantiene el contenedor activo

---

### 5️⃣ Configuración de red (opcional)

```bash
sudo mousepad /etc/containers/containers.conf
```

Agregar:

```ini
[engine]
network_cmd = "host"
```

📌 **¿Qué hace?**
Permite que Podman use la red del host, evitando problemas de conexión.

---

### 6️⃣ Construir la imagen

```bash
podman build -t ef-app .
```

📌 **¿Qué hace?**
Crea una imagen llamada `ef-app` a partir del Dockerfile.

---

### 7️⃣ Verificar imágenes

```bash
podman images
```

📌 **¿Qué hace?**
Muestra las imágenes disponibles en el sistema.

---

### 8️⃣ Ejecutar contenedor

```bash
podman-compose up
```

📌 **¿Qué hace?**
Levanta el contenedor definido en `compose.yml`.

---

### 9️⃣ Acceder a la aplicación

```
http://localhost:8080
```

📌 **¿Qué hace?**
Permite acceder a la aplicación desde el navegador.

---

## 🔍 Comandos útiles

### Ver puertos en uso

```bash
sudo ss -tuln
```

📌 Muestra los puertos ocupados en el sistema.

---

### Ver contenedores activos

```bash
podman ps
```

📌 Lista los contenedores en ejecución.

---

### Ver logs del contenedor

```bash
podman logs ef-app
```

📌 Muestra errores o información del contenedor.

---

## 🛠 Problemas solucionados

* ❌ Error en COPY (ruta incorrecta)
  ✔ Se corrigió el nombre de carpeta (`app_ef`)

* ❌ Falta de extensión `intl`
  ✔ Se instaló con `docker-php-ext-install`

* ❌ Error de conexión MySQL
  ✔ Se agregó `pdo_mysql` y `mysqli`

* ❌ Error de imagen inexistente
  ✔ Se ejecutó `podman build`

---


##🌍 Funcionalidades de Internacionalización (i18n)

El sistema implementa mecanismos de internacionalización para soportar múltiples idiomas en la interfaz:
Selector de Idiomas:
---
* Menú dinámico para cambiar entre 11 idiomas (ES, EN, PT, FR, DE, RU, ZH, JA, KO, AR, HI).
  
* Persistencia: El idioma se guarda en el perfil del usuario y en la sesión.
  
* Descripciones Bilingües: Soporte para títulos y descripciones en diferentes lenguas simultáneamente.

* Recursos: Uso de archivos .po localizados en resources/locales/.
---


---
📸 Vista Previa del Sistema
---
* Módulo                                                                         *Funcionalidad
Gestión de Tareas                                                                 CRUD completo con filtros por estado y buscador de títulos.
Edición Localizada                                                                Formulario con pestañas para ingresar descripciones en varios idiomas.
Fichas Técnicas                                                                   Vista de detalle organizada para contenidos extensos y bilingües.
Catálogo de Plantas                                                               Módulo de gestión botánica integrado con el sistema de seguridad.
---

---
🤖 Bitácora de Inteligencia Artificial
--

En cumplimiento con el modelo educativo UPDS, se utilizó IA como apoyo estratégico en:


---
* Optimización DevOps: Creación del Dockerfile y resolución de conflictos de permisos en carpetas tmp/ y logs/.
* Lógica de Traducción: Generación de archivos de recursos para idiomas con alfabetos no latinos.
* Refactorización: Mejora de la seguridad en el AppController para el manejo de sesiones multilingües.
* Las sugerencias de la IA fueron evaluadas y modificadas críticamente antes de su implementación.
---

---
* Autor: Alexandra Ibañez
---
