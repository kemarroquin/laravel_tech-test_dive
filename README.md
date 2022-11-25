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
      - [Configuración del archivo .env](#dependiendo-el-servicio-que-ha-seleccionado-para-mysql-configure-sus-achivos-env-de-las-siguientes-dos-opciones)
        - [Usando Wamp, Xamp, MySQL Workbech u otro](#si-usará-wamp-xamp-mysql-workbench-ejecute-cp-envexampledive-env)
        - [Usando Docker](#si-usará-docker-ejecute-cp-envexampledocker-env)
      - [Configuraciones Finales](#configuraciones-finales)
    - [Ejecutar el proyecto](#ejecutar-el-proyecto)

## Pre-requisitos

* Tener instalado [PHP ^v7.3](https://www.php.net/downloads.php)
* Tener instalado [Composer](https://getcomposer.org/) en tu conputadora
* Tener instalado [Node.js](https://nodejs.org/en/) en tu computadora.
* Tener instalado [Git](https://git-scm.com/) en tu computadora.
* Tener instalado [Visual Studio Code](https://code.visualstudio.com/) en tu computadora.
* Tener instalado [Wamp](https://www.wampserver.com/en/), [Xamp](https://www.apachefriends.org/es/index.html) para uso de Apache.

### Pre-requisitos (opcionles)

* Tener instalado [(Cliente) MySQL Workbench](https://www.mysql.com/products/workbench/) u otro servicio que le permita tener una instancia de base de datos MySQL local (Opcional si desea instalar docker y seguir el proceso de configuración)
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
  * Si persiste un error con las dependencias, ejecute `composer update`, si el error persiste, actualice a su versión de php mas reciente en `composer.json` (Php ^v8.0 [Recomendada])
* Instale dependencias de NodeJS `npm install`

#### Instalar Docker (Opcional)
Si usted ha elegido instalar docker, primero necesita el [cliente](https://www.docker.com/) que le instalará Docker Desktop y Docker Terminal <br>
(Si decidio por este servicio, tenga en cuenta que solo se utilizaría para tener una instancia MySQL en un contenedor)

* Instale [Docker](https://www.docker.com/)
* Después de instalar, ejecute el Docker Desktop y espere a que se configure
* Ir a la carpeta del projecto `cd laravel_tech-test_dive`
* Desde el directorio del proyecto, corra el comando `docker compose up` para que se cree la instancia de MySql.
  * Es Recomendable que habra otra terminal para no suspender el contenedor de Docker
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
      - MYSQL_DATABASE=laravel_techtest_dive
      - MYSQL_USER=laravel
      - MYSQL_PASSWORD=password
```
* PORTS [3310:3306]
  * 3310 => Puerto Local
  * 3306 => Puerto maquina virtual (Contenedor de Docker)
* Credenciales MySQL
```yaml
    database: laravel_techtest_dive
    user: laravel
    password: password 
```

<br>

## Configuración del Proyecto

* #### Dependiendo el servicio que ha seleccionado para Mysql, configure sus achivos `.env` de las siguientes dos opciones:
  * #### Si usará (WAMP, XAMP, MySQL Workbench) ejecute `cp .env.example.dive .env`
      ```env
          # Swagger API Docs
          L5_SWAGGER_GENERATE_ALWAYS=true

          # DB Connection Settings
          DB_CONNECTION=mysql
          DB_HOST=127.0.0.1
          DB_PORT=3306
          DB_DATABASE=laravel_techtest_dive
          DB_USERNAME=[root || your_user]
          DB_PASSWORD=[empty_string || your_password]
      ```
      * Explicación de valores:
        * DB_USERNAME:
          * root (Valor sugerido)
          * your_user (Valor elegido por usted)
        * DB_PASSWORD:
          * empty_string (Valor sugerido, variable sin valor)
          * your_password (Valor elegida por usted)

  * #### Si usará Docker ejecute `cp .env.example.docker .env` 
      ```env
          # Swagger API Docs
          L5_SWAGGER_GENERATE_ALWAYS=true

          # DB Connection Settings
          DB_CONNECTION=mysql
          DB_HOST=127.0.0.1
          DB_PORT=3310
          DB_DATABASE=laravel_techtest_dive
          DB_USERNAME=laravel
          DB_PASSWORD=password
      ```

<br>

## Configuraciones Finales
  * Cree una nueva APP_KEY para Laravel `php artisan key:generate`
  * Para finalizar, corra el comando `php artisan migrate` para realizar la implementación automatica de la base de datos con Laravel.
  * Ejecute `php artisan db:seed` para llenar la base de datos con data aleatoria poblada por (FAKER)

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