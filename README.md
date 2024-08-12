## 🍽️ Sistema de Gestión de Restaurantes

¡Bienvenido al repositorio oficial de nuestro completo sistema de gestión de restaurantes! 🌟

## Descripción

Este proyecto es un sistema de gestión de restaurante que incluye funcionalidades para manejar pedidos, kardex de inventario y productos. Está diseñado para optimizar las operaciones diarias de un restaurante, mejorando la eficiencia y la precisión en la gestión de inventarios y pedidos.

## Funcionalidades
<ul>
<li>Gestión de Usuarios: Administra el acceso y los permisos de tu personal de manera eficiente.</li>
<li>Kardex: Lleva un control detallado de tu inventario y movimientos de productos.</li>
<li>Pedidos y Comandas: Gestiona los pedidos de los clientes y las comandas de cocina de forma ágil y precisa.</li>
<li>Productos: Administra tu catálogo de productos, incluyendo precios y disponibilidad.</li>
<li>Cierres: Realiza cierres de caja y genera reportes financieros detallados.</li>
<li>Precios: Ajusta los precios de tus productos de manera dinámica y según la demanda.</li>
<li>Estadísticas: Analiza el rendimiento de tu restaurante con estadísticas detalladas y reportes personalizados.</li>
</ul>


## Características

- **Gestión de Pedidos**: Permite a los usuarios realizar y gestionar pedidos de manera eficiente.
- **Kardex de Inventario**: Lleva un registro detallado de las entradas y salidas de inventario, facilitando el control de stock.
- **Gestión de Productos**: Administra los productos disponibles en el restaurante, incluyendo precios, categorías y descripciones.
- **Reportes y Análisis**: Genera reportes detallados sobre ventas, inventarios y otros aspectos clave del negocio.
- **Interfaz Amigable**: Diseño intuitivo y fácil de usar para todos los niveles de usuarios.

## Instalación

1. Descarga e instala [XAMPP](https://www.apachefriends.org/download.html).
2. Clona el repositorio:
    ```bash
    git clone https://github.com/tu_usuario/sistema-gestion-restaurante.git
    ```
3. Copia los archivos del proyecto al directorio `htdocs` de XAMPP:
    ```bash
    cp -r sistema-gestion-restaurante /caminio/a/tu/xampp/htdocs/
    ```
4. Inicia Apache y MySQL desde el panel de control de XAMPP.
5. Crea una base de datos en MySQL y configura el archivo de conexión en el proyecto:
    ```php
    // config.php
    $servername = "localhost";
    $username = "tu_usuario";
    $password = "tu_contraseña";
    $dbname = "restaurante";
    ```
6. Importa el archivo SQL incluido en el proyecto para crear las tablas necesarias:
    ```sql
    mysql -u tu_usuario -p restaurante < /caminio/a/tu/xampp/htdocs/sistema-gestion-restaurante/database/restaurante.sql
    ```
7. Abre tu navegador y navega a `http://localhost/sistema-gestion-restaurante` para empezar a usar el sistema.

## Contribuciones

¡Las contribuciones son bienvenidas! Si deseas colaborar, por favor sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios y haz commit (`git commit -am 'Añadir nueva funcionalidad'`).
4. Sube tus cambios (`git push origin feature/nueva-funcionalidad`).
5. Abre un Pull Request.

## Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.

## Contacto


¡Esperamos que este sistema de gestión de restaurante te sea de gran ayuda!
