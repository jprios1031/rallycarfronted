El frontend de RallyCar fue construido con Laravel 12, plantillas Blade, css y algunos eventos de javascript. Esta aplicación se conecta al backend mediante HTTP Client, utilizando tokens generados por Sanctum. Permite gestionar novedades, usuarios,vehiculos, ventas y gastos desde una interfaz sencilla y funcional.

Tecnologías utilizadas

Laravel 12

Blade Templates

Laravel HTTP Client

css

javascript

MySQL

Roles y Middlewares

AdminMiddleware: acceso a todo el sistema (usuarios, gastos, ventas, etc.).

ClienteMiddleware: acceso limitado a sus propias novedades y perfil.

Módulos principales

Dashboard general.

Gestión de novedades.

Gestión de ventas.

Gestión de gastos.

Gestión de usuarios y vehiculos.

Pruebas end-to-end

Se realizaron pruebas manuales de flujo completo:

Login y consumo del token del backend.

Creación, edición y eliminación de registros.

Validación visual de permisos y rutas protegidas.

Comprobación del correcto intercambio entre frontend y API.

Instalación git clone https://github.com/jprios1031/rallycarfronted.git cd rallycarfronted-main composer install npm install cp .env.example .env php artisan key:generate php artisan serve --port=8080

Configura la URL del backend en el archivo .env del frontend:

API_URL=http://127.0.0.1:8000/api