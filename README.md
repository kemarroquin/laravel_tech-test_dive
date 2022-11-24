# Laravel Tech-Test Dive - Prueba Tecnica Desarrollador Web

----
#### Guía de Instalación (by Kevin Marroquín)
----
<br>

- [Laravel Tech-Test Dive - Prueba Tecnica Desarrollador Web](#laravel-tech-test-dive---prueba-tecnica-desarrollador-web)
      - Guía de Instalación (by Kevin Marroquín)
    - [Pre-requisitos](#pre-requisitos)
      - [Opcionales](#pre-requisitos-opcionles)
    - [Instrucciones](#instrucciones)
      - [Usuarios](#usuarios)
      - [Empresa](#empresa)
    - [Entrega esperada del proyecto](#entrega-esperada-del-proyecto)
    - [Puntos a evaluar](#puntos-a-evaluar)
    - [Requisitos tecnicos](#requisitos-tecnicos)
    - [Ejemplo de response](#ejemplo-de-response)
  - [Fecha límite de envío](#fecha-límite-de-envío)
  - [Hora límite de envío](#hora-límite-de-envío)
  - [Formas de enviar el proyecto](#formas-de-enviar-el-proyecto)
  - [Dive Digital](#dive-digital)

### Pre-requisitos

* Tener instalado [Node.js](https://nodejs.org/en/) en tu computadora.
* Tener instalado [Git](https://git-scm.com/) en tu computadora.
* Tener instalado [Visual Studio Code](https://code.visualstudio.com/) en tu computadora.

#### Pre-requisitos (opcionles)

* Tener instalado [Docker](https://www.docker.com/) para una instancia MySql

<br>
IMPORTANTE: El proceso de instalación hará uso de dependencias adicionales tanto para Laravel como para Vue.JS
<br><br>

### Instalacion
Puntos detallados para una optima instalación de la prueba:

#### Usuarios

* Nombre
* Apellido
* Email
* Telefono
* Fecha de nacimiento
* Genero
* Ciudad
* Pais
* Estado
* Empresa a la que pertenece

#### Empresa

* Nombre
* Email
* Telefono
* Ciudad
* Pais
* Estado
* Direccion


### Entrega esperada del proyecto

* El proyecto debe ser entregado en un repositorio de Git (Github, Gitlab, Bitbucket, etc).
* Al finalizar la prueba, debes enviar el link del repositorio a la persona que te contacto.
* Altamento recomendable que el repositorio sea publico.
* Documentar el proceso de instalacion del proyecto en el archivo README.md del repositorio.
* Debes crear un archivo .env.example con las variables de entorno que se usaran en el proyecto.
* Un Api Rest que permita crear, editar, eliminar y listar datos.
* Frontend que permita crear, editar, eliminar y listar datos.

### Puntos a evaluar

* Estructura del proyecto.
* Buenas practicas de programacion.
* Validaciones.
* Documentacion.

### Requisitos tecnicos

* El proyecto debe ser desarrollado en Laravel.
* El proyecto debe ser desarrollado en Vue.js (no es requerido presentar un front por temas de tiempo).
* El proyecto debe ser desarrollado en MySQL.



### Ejemplo de response


```json
{
    "nombre": "Chepe",
    "apellido": "Donoso",
    "email": "josecito@mail.com",
    "telefono": "123456789",
    "fecha_nacimiento": "12 de mayo de 2022",
    "genero": "Masculino",
    "ciudad": "Soyapango",
    "pais": "El Salvador",
    "estado": "Activo"
    "empresa": {
        "nombre": "Dive Lab Tech",
    }
}
```

## Fecha límite de envío

25-11-2022

## Hora límite de envío

11:59pm

## Formas de enviar el proyecto

* URL de un hosting determinado
* Repositorio de Github/Gitlab/Bitbucket

Enviar notificación de su proyecto al correo egonzalez@dive.digital
Asunto en el correo electrónico: Prueba Técnica - Dive Digital Dev MID

## [Dive Digital](https://dive.digital/)