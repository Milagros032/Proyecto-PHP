# 🛒 Prueba Técnica: Sistema de Gestión de Compras (PHP & PostgreSQL)

Este repositorio contiene la resolución de una prueba técnica orientada al desarrollo de un sistema de gestión de base de datos relacional y su visualización web dinámica. El proyecto implementa una arquitectura organizada, separando la configuración, la lógica de datos (Modelos) y la capa de presentación (Vistas).

## 📋 Consignas del Proyecto
El desarrollo cumple con los siguientes requerimientos solicitados:
1. **Infraestructura:** Configuración de un entorno con Apache, PHP 8 y PostgreSQL.
2. **Base de Datos:** - Creación de tabla `clientes` (id, nombre, apellido, DNI, fecha de nacimiento).
   - Creación de tabla `productos` (id, nombre, descripción).
   - Creación de tabla intermedia `compras` (id, cliente_id, producto_id, precio).
   - Inserción de datos de prueba variados para validación.
3. **Lógica de Negocio:** Implementación de una query para obtener los clientes **mayores de edad** que compraron el producto **"fideo"**.
4. **Interfaz Gráfica:** Renderización de resultados en una vista HTML/CSS utilizando el motor de plantillas **Twig** y **Bootstrap 5**.

## 🛠️ Tecnologías Utilizadas
* **Backend:** PHP 8.x (Programación Orientada a Objetos).
* **Base de Datos:** PostgreSQL.
* **Motor de Plantillas:** Twig (Gestionado con Composer).
* **Frontend:** Bootstrap 5 (Diseño responsivo).
* **Conectividad:** PDO (PHP Data Objects) con manejo de excepciones.

## 📁 Estructura del Repositorio
* `config/conexionbbdd.php`: Conexión centralizada a la base de datos `tienda`.
* `models/querys.php`: Clase `QueryModel` que encapsula la lógica de consultas SQL.
* `scripts BBDD/`:
    * `crear tablas.sql`: Definición del esquema y relaciones de claves foráneas (FK).
    * `datos prueba.sql`: Scripts `INSERT` para poblar las tablas.
    * `query.sql`: Consulta técnica específica para filtrar por producto y edad.
* `views/fideos.html.twig`: Plantilla Twig para la visualización de la tabla de resultados.
* `index.php`: Punto de entrada que procesa la lógica y renderiza la vista.

## 🔍 Resolución Técnica: Consulta de Mayores de Edad
Para cumplir con el filtrado por edad en PostgreSQL, se utilizó la función `AGE` y `DATE_PART`:

```sql
SELECT 
    c.id, 
    c.nombre, 
    c.fecha_nacimiento, 
    co.precio
FROM clientes c
JOIN compras co ON c.id = co.cliente_id
JOIN productos p ON p.id = co.producto_id
WHERE p.nombre ILIKE 'fideo'
AND DATE_PART('year', AGE(c.fecha_nacimiento)) >= 18;
```
## 🚀 Instalación y Configuración Paso a Paso
Siga estos pasos para ejecutar el proyecto en su entorno local:

### 1. Clonar el repositorio
```bash
https://github.com/Milagros032/Proyecto-PHP.git
```
### 2. Instalar dependencias (Twig)
Es necesario tener Composer instalado. Ejecute el siguiente comando en la raíz del proyecto:

```bash
composer install
```
### 3. Configurar la Base de Datos (PostgreSQL)
Acceda a su gestor de base de datos (pgAdmin o terminal).

Cree una base de datos llamada `tienda`.

Ejecute los scripts ubicados en la carpeta `scripts BBDD/` en el siguiente orden:

Primero: `crear tablas.sql`

Segundo: `datos prueba.sql`

### 4. Ajustar credenciales de conexión
Abra el archivo `config/conexionbbdd.php` y verifique que los datos coincidan con su configuración local:

`$host`: Generalmente `localhost`.

`$port`: Por defecto `5432`.

`$user`: Su usuario de PostgreSQL (ej. `postgres`).

`$password`: Su contraseña de base de datos.

### 5. Ejecutar el proyecto
Asegúrese de que su servidor Apache esté activo y apunte a la carpeta del proyecto.
Luego, abra su navegador en `http://localhost:8000`.
___________________________________________________________________________________________
Desarrollado por Milagros - Proyecto de Evaluación Técnica 2026
