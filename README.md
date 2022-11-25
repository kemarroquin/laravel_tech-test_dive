# Laravel Tech-Test Dive - Prueba Tecnica Desarrollador Web

----
#### Guía de Instalación (by Kevin Marroquín)
----
<br>

- [Laravel Tech-Test Dive - Prueba Tecnica Desarrollador Web](#laravel-tech-test-dive---prueba-tecnica-desarrollador-web)
      - Guía de Instalación (by Kevin Marroquín)
    - [Pre-requisitos](#pre-requisitos)
      - [Opcionales](#pre-requisitos-opcionles)
    - [Instalación](#instalacion)
      - [Obtener el proyecto](#obtener-el-proyecto-requeridos)
        - [Instalar Dokcer (Opcional)](#instalar-docker-opcional)
    - [Configuración del proyecto](#configuración-del-proyecto)
      - [Configuración del archivo .env](#configuración-del-archivo-env)
        - [Usando Wamp, Xamp, MySQL Workbech u otro](#si-usará-un-proveedor-de-base-de-datos-como-wamp-xamp-mysql-workbech-haga-uso-del-archivo-envexampledive-para-actualizar-su-archivo-env)
        - [Usando Docker](#si-hará-uso-de-docker-haga-uso-del-archivo-envexampledocker-para-actualizar-su-archivo-env)
      - [Configuraciones Finales](#configuraciones-finales)
    - [Ejecutar el proyecto](#ejecutar-el-proyecto)

## Pre-requisitos

* Tener instalado [Node.js](https://nodejs.org/en/) en tu computadora.
* Tener instalado [Git](https://git-scm.com/) en tu computadora.
* Tener instalado [Visual Studio Code](https://code.visualstudio.com/) en tu computadora.
* Tener instalado [Wamp](https://www.wampserver.com/en/), [Xamp](https://www.apachefriends.org/es/index.html), [MySQL Workbench](https://www.mysql.com/products/workbench/) u otro servicio que le permita tener una instancia de base de datos MySQL local (Opcional si instala docker y sigue el proceso de configuración)

### Pre-requisitos (opcionles)

* Tener instalado [Docker](https://www.docker.com/) para una instancia MySql

<br>
<b>IMPORTANTE: El proceso de instalación hará uso de dependencias adicionales tanto para Laravel como para Vue.JS</b>
<br><br>

## Instalacion
Puntos detallados para una optima instalación de la prueba:

### Obtener el proyecto (Requeridos)

* Clone el repositorio `git clone https://github.com/kemarroquin/laravel_tech-test_dive.git`
* Ingrese a la carpeta del repositorio `cd laravel_tech-test_dive`
* Instale dependencias de Laravel `composer install`
* Instale dependencias de NodeJS `npm install`
* Haga una copia de `.env.example` con el nombre de `.env` (Mas adelante se configurará)
    * (Windows | MacOS | Linux) `cp .env.example .env`
* Cree una nueva APP_KEY para Laravel `php artisan key:generate`

#### Instalar Docker (Opcional)
Si usted ha elegido instalar docker, primero necesita el [cliente](https://www.docker.com/) que le instalará Docker Desktop y Docker Terminal <br>
(Si decidio por este servicio, tenga en cuenta que solo se utilizaría para tener una instancia MySQL en un contenedor)

* Instale [Docker](https://www.docker.com/)
* Después de instalar, ejecute el Docker Desktop y espere a que se configure
* Ir a la carpeta del projecto `cd laravel_tech-test_dive`
* Desde el directorio del proyecto, corra el comando `docker compose up` para que se cree la instancia de MySql
* La consola respondera con las lineas de ejecución del contenedor (logs)
* Archivo de configuración: `docker-compose.yaml`
```yaml
services:
  laravel_techtest_dive:
    container_name: laravelTechTestDive_DB
    image: "mysql"
    ports:
      - "3310:3306"
    environment:
      - MYSQL_ROOT_PASSWORD=password
```
* PORTS [3310:3306]
  * 3310 => Puerto Local
  * 3306 => Puerto maquina virtual (Contenedor de Docker)
* Credenciales MySQL
```yaml
    user: root
    password: password 
```

<br>

## Configuración del Proyecto

* ### Configuración del archivo .env 
  * #### Si usará un proveedor de base de datos como Wamp, Xamp, MySQL Workbech, haga uso del archivo `.env.example.dive` para actualizar su archivo .env

    ```env
        # Swagger API Docs
        L5_SWAGGER_GENERATE_ALWAYS=true

        # DB Connection Settings
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=[laravel_techtest_dive || your_database]
        DB_USERNAME=[root || your_user]
        DB_PASSWORD=[empty_string || your_password]


        # This is only a stract of .env file that changes,
        # others variables are the same.
    ```
    * Explicación de valores:
      * DB_DATABASE:
        * laravel_techtest_dive (sugerido)
        * your_database (nombre elegido por usted)
      * DB_USERNAME:
        * root (sugerido)
        * your_user (nombre elegido por usted)
      * DB_PASSWORD:
        * empty_string (sugerido, variable sin valor)
        * your_password (contraseña elegida por usted)

  * #### Si hará uso de Docker, haga uso del archivo `.env.example.docker` para actualizar su archivo .env
    ```env
        # Swagger API Docs
        L5_SWAGGER_GENERATE_ALWAYS=true

        # DB Connection Settings
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3310
        DB_DATABASE=[laravel_techtest_dive || your_database]
        DB_USERNAME=root
        DB_PASSWORD=password


        # This is only a stract of .env file that changes,
        # others variables are the same.
    ```
    * Explicación de valores:
      * DB_DATABASE:
        * laravel_techtest_dive (sugerido)
        * your_database (nombre elegido por usted)

* ### Configuraciones Finales
  * Para finalizar, corra el comando `php artisan migrate` para realizar la creación automatica de la base de datos con laravel
  * Ejecute `php artisan db:seed` para llenar la base de datos con data aleatoria por (FAKER)



## Ejecutar el Proyecto

* Ejecute `php artisan serve` para ejecutar el proyecto y visitarlo en los siguientes links:
  * [http://127.0.0.1:8000](http://127.0.0.1:8000)
  * [http://localhost:8000](http://localhost:8000)
* Para acceder directamente a la documentación de la API (Desarrollado con [Swager.io](https://github.com/DarkaOnLine/L5-Swagger)), haga uso del siguiente Link:
  * [http://127.0.0.1:8000/api/documentation](http://127.0.0.1:8000/api/documentation)
  * [http://localhost:8000/api/documentation](http://localhost:8000/api/documentation)
* Para acceder directamente a la vista de Vue, haga uso del siguiente Link:
  * [http://127.0.0.1:8000/vue](http://127.0.0.1:8000/vue)
  * [http://localhost:8000/vue](http://localhost:8000/vue)
    * <i>Vue solo esta desarrollado a nivel de consulta de información. Ya que no fue totalmente contemplado en los requerimientos técnicos de la prueba.</i>