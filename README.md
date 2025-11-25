
1.  **Clonar el repositorio**
    ```bash
    git clone https://github.com/JhoelVillca/chocoTaboada.git
    cd chocoTaboada
    ```

2.  **Instalar dependencias de PHP**
    ```bash
    composer install
    ```

3.  **Configurar variables de entorno**
    Copia el archivo de ejemplo:
    ```bash
    cp .env.example .env
    ```
    Edita el archivo `.env` con tus credenciales de base de datos y configuración local.

4.  **Generar la clave de aplicación**
    ```bash
    php artisan key:generate
    ```

5.  **Crear la base de datos con MySql con el xampp corriendo**
    ```bash
    CREATE DATABASE chocoTaboada;
    ```

7.  **Ejecutar migraciones (si aplica)**
    ```bash
    php artisan migrate
    ```

8.  **Levantar el servidor local**
    ```bash
    php artisan serve
    ```
===

## 👨‍💻 Comandos útiles

**Limpiar caché de configuración:**
```bash
php artisan config:clear
php artisan cache:clear
