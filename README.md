Task Manager - Sistema de Gestión de Tareas
Aplicación profesional para gestionar tus tareas diarias

🚀 Características Principales
✅ Gestión completa de tareas (crear, editar, eliminar, completar)

📂 Organización por categorías con sistema de filtrado

📅 Fechas límite configurables con recordatorios visuales

🔍 Búsqueda rápida y paginación de resultados

📊 Separación inteligente entre tareas activas y completadas

🔒 Sistema de autenticación seguro (registro y login de usuarios)

🌙 Modo oscuro elegante con diseño moderno

📱 Totalmente responsive (funciona en móviles, tablets y desktop)

🛠 Tecnologías Utilizadas
Backend:

PHP 8.1+

Laravel 10

MySQL/MariaDB

Frontend:

Tailwind CSS

CSS3 con variables personalizadas

JavaScript Vanilla

Animaciones CSS

Herramientas:

Vite (compilación de assets)

Eloquent ORM

Blade Templating

Laravel Breeze (autenticación)

⚙️ Requisitos del Sistema
PHP 8.1 o superior

Composer 2

Node.js 16+

Base de datos (MySQL, PostgreSQL o SQLite)

Extensión PDO para PHP

Extensión mbstring para PHP

🖥 Instalación Local
Sigue estos pasos para instalar el proyecto en tu máquina local:

Clonar repositorio:

```
bash
git clone https://github.com/DiegoOrtegaGarcia/To-Do-List.git
cd task-manager
```

Instalar dependencias:

bash
composer install
npm install
Configurar entorno:

bash
cp .env.example .env
php artisan key:generate
Configurar base de datos:
Editar el archivo .env:

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_bd
DB_USERNAME=usuario_bd
DB_PASSWORD=contraseña_bd
Migrar base de datos:

bash
php artisan migrate
Compilar assets:

bash
npm run build
Iniciar servidor:

bash
php artisan serve
Visita la aplicación en: http://localhost:8000

🌐 Despliegue en Producción
Subir archivos al servidor (excluyendo node_modules y .env)

Instalar dependencias:

bash
composer install --optimize-autoloader --no-dev
npm install && npm run build
Configurar archivo .env con datos de producción

Generar clave de aplicación:

bash
php artisan key:generate
Migrar base de datos:

bash
php artisan migrate --force
Optimizar la aplicación:

bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
Configurar permisos:

bash
chmod -R 775 storage bootstrap/cache
🤝 Contribuir
Las contribuciones son bienvenidas. Sigue estos pasos:

Haz un fork del proyecto

Crea tu rama feature (git checkout -b feature/awesome-feature)

Haz commit de tus cambios (git commit -m 'Add awesome feature')

Haz push a la rama (git push origin feature/awesome-feature)

Abre un Pull Request

📄 Licencia
Este proyecto está bajo la licencia MIT. Consulta el archivo LICENSE para más detalles.

Task Manager © 2023 - Desarrollado con ❤️ usando Laravel
