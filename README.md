<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Trabajo práctico final - Laboratorio III

# Instrucciones de Instalación

Este documento describe los pasos necesarios para configurar el entorno de desarrollo en la PC local bajo sistemas operativos Linux utilizando Docker.

### Pre instalación del Proyecto.

* Tener instalado Git.
* Tener instalado Composer.
* Tener instalado php-client php-mbstring.

### Clonar Repositorio de GitHub.

``` 
git@github.com:MartinMontanari/TrabajoFinal-LabIII.git
```

### Realizar la instalación de composer en el proyecto.
```
https://getcomposer.org/download/
```
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'c31c1e292ad7be5f49291169c0ac8f683499edddcfd4e42232982d0fd193004208a58ff6f353fde0012d35fdd72bc394') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
PD: Si bien aquí se brinda el hash en su última versión al día 19/10/2020 tener en cuenta que el hash de arriba siempre se actualiza por lo que es mejor entrar a la página de composer.

#### Copiamos el `composer.phar` de instalación que nos proveen los comandos anteriores en la carpeta raíz del proyecto (`TrabajoFinal-LabIII/`)

### Instalación de los contenedores de Docker.
* Primeramente tener `docker` y `docker-compose` instalados (utilizar las guías de Digital Ocean estan bien documentadas).

1. Entrar a la carpeta de docker del proyecto. (`TrabajoFinal-LabIII/docker`)

2. Realizar un `docker-compose pull`

3. Realizar un `docker-compose up -d`

4. Encender los contenedores con `docker-compose start`

5. Listo ya se encuentra levantado el servidor y la base de datos (MySQL).

### Asignación de los permisos de Laravel.
Es necesario para la correcta visualización y funcionamiento del proyecto que se asignen los siguientes permisos:

```
    sudo chown -R 1000:33 storage/
    sudo chmod -R g+w storage/
    sudo chown -R 1000:33 bootstrap/cache
    sudo chmod -R g+w bootstrap/cache
```

PD: Puede suceder que en momentos al crearse archivos de Logs nuevos tengamos que reasignar los permisos al storage/ (ver como solucionar esto, muchas veces al terminar la instalación del proyecto necesitamos asignar de nuevo estos permisos).
 
### Instalación de las dependencias.
1. Nos ubicamos en la carpeta de docker del proyecto (`/docker`)

2. Acceder al Lord Commander (Ricky Fort) ejecutando `./webapp` (basicamente es nuestro bash de nginx `docker-compose run --user=1000 phpnginx bash`)

3. Ejecutamos `./composer.phar install`

4. Esperar la instalación de dependencias de Laravel y compañía.

### Configuración de la Base de Datos.
Si has seguido los pasos anteriores correctamente, la base de datos ya se encuentra configurada ya que se ha creado junto con los containers de docker en el punto anterior.

##### Tenemos 2 modos de acceder a la base de datos:
###### Mediante consola de comandos
1. Para acceder a la base de datos mediante entorno CLI, ejecutamos `docker exec -it docker_mysql_1 bash` (con esto ingresamos a mysql del docker)

2. Ejecutamos `mysql -uroot -psecret`

3. Verificamos si la base de datos se encuentra creada con: `show databases;`

4. Para poder usarla y ejecutamos el comando: `use trabajofinal;`

###### Mediante adminer desde el navegador
1. Tener los containers levantados.

2. Acceder a la URL localhost:8080 desde nuestro navegador, allí se encontrará con un login.

3. Para loguearse y acceder a la interfaz, completar los campos:
```
Servidor = mysql
Usuario = test
Contraseña = test
Base de datos = trabajofinal (éste último campo puede no completarlo y podrá acceder de todos modos y seleccionar la bdd luego)
```

### Crear archivo de Enviroment
1. Crear un archivo ```.env```
2. Copiar lo que existe en el ```.env.example```
3. Este archivo contiene las credenciales de las cuentas de los servicios utilizados.

### Ejecución de las migraciones (Laravel)
0. Primeramente actualizar el archivo `.env` con los datos correspondientes de la BD:

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=trabajofinal
DB_USERNAME=test
DB_PASSWORD=test
```

1. Entramos al `bash nginx` del Lord Commander ubicados en `TrabajoFinal-LabIII/docker/` ejecutar: `./webapp`.

2. Ejecutamos dentro del bash `php artisan migrate`

3. Una vez terminada la ejecución ya tendremos las tablas correspondientes en nuestra base de datos `trabajofinal`.

4. Ejecutar para tener el `.env` completo y correcto `php artisan key:generate`.

5. Listo ya podemos salir del comandante.

### Ultimos pasos.

1. Ya podemos entrar al sitio `localhost` pero aún falta instalar y compilar las dependencias necesarias para una correcta visualización de los componentes de las vistas.

2. Para ello, dentro de la carpeta raíz `TrabajoFinal-LabIII/` ejecutar los comandos `npm install` y `npm run prod`

2. Deberíamos visualizar correctamente la página de inicio.


# Arquitectura del Sistema

Respecto a la organización de capas lógicas se encuentra basado en Arquitectura Hexagonal / Ports and Adapter / Onion Architecture:

![Arquitectura Software](https://user-images.githubusercontent.com/22304957/63598334-b6d93d00-c595-11e9-958a-8f5ff090993f.png)

### API/Presentation:
Esta es la capa propia del patrón MVC, esta es la capa correspondiente para acoplarnos al Framework, en nuestro caso *Laravel*

Estructura de directorios:

- Controllers / Actions : Puede orientarse a acciones directamente donde poseen todas las operaciones correspondientes como: Crear - Leer - Actualizar - Eliminar. Son los encargados de comunicarse con la capa de `Aplicacion` mediante los contratos correspondientes (Commands/Queries). Estan acoplados al framework y al protocolo HTTP en este caso GET/POST/PUT/PATCH/DELETE.

Es importante para evitar el acoplamiento a nivel interno que no se envíen a los servicios directamente la Request completa, para eso existen los contratos (Commands/Queries) que son los que nos permiten según el caso de uso ver que datos son necesarios a nivel de Aplicación para lograr comunicarnos y realizar una acción determinada.

- Routes: Lugar donde colocaremos los diferentes endpoints de nuestra API y donde Laravel hace un match entre el path especificado y el Action correspondiente.

### APPLICATION
- Commands: Serán los puntos de entrada a nuestra capa de aplicación, son las interfaces que conoce la capa superior (API/Presentation) para comunicarse a traves de nuestro dominio del sistema.

- Services/Handlers: Son los que orquestaran los casos de usos correspondientes al sistema, estos son los encargados de manejar los casos de uso utilizando los elementos de su misma capa o utilizando elementos del dominio correspondiente como los repositorios (contratos), entidades, servicios de dominio, Value Objects, Enums, etc.

### DOMAIN
Esta capa es Framework Agnostic, al igual que debería serlo la capa anterior, se caracteriza por contener toda la lógica de nuestro negocio, mediante entidades / servicios de dominio / value objects. Representa los conceptos del negocio de nuestro cliente

- Entities: Son los objetos con identidad correspondientes a nuestro dominio por ejemplo: Usuario, Producto, Reservas, etc.

- Repositorios (Contratos): Se almacenaran los contratos / interfaces correspondientes al dominio de nuestra app, pudiendo entrar aquí para desacoplar la persistencia, las interfaces de la capa de repositorios.

- Value Objects

- Enums

...

### INFRASTRUCTURE

#### PERSISTENCE

Es la capa encargada de persistir nuestras entidades de dominio.

- Repositories: Para manejar las consultas de las entidades y la persistencia de las mismas, esta capa es la implementación de los contratos declarados en el dominio del sistema.
- Migrations: Para el correcto versionado de las tablas y que todos los devs tengamos una mayor consistencia de nuestra base de datos, ya que ejecutando estas mismas nos aseguramos que todos poseemos la misma BD.
- Seeders: Para rellenar las bases con sus tablas correspondientes.
- Mappings: Archivos para desacoplar el dominio de la persistencia, aca realizamos el mapeo que dice que tablas se manejan con que atributos del sistema. (En caso de utilizar Doctrine)

#### Fuentes de consulta para estas Arquitecturas, Conceptos, Buenas prácticas:

https://martinfowler.com/eaaCatalog/ (Conceptos para el ORM DataMapper vs ActiveRecord)

https://domainlanguage.com/ddd/ (Conceptos DDD como: Entidades / Value Objects / Servicios / Commands / Shared-Kernel / Repositorios)

Ese libro azul principal tiene todos los conceptos correspondientes utilizados aquí como las mejores prácticas para orientarse al dominio y crear sistemas lo más desacoplados y correctos posibles.

Un resumen de este gratuito es:

http://domainlanguage.com/wp-content/uploads/2016/05/DDD_Reference_2015-03.pdf

### Inyección Dependencias / Inversión de Control
Para mantenernos sin acoplamientos y poder cumplir bien con la arquitectura se necesita de la inyección de dependencias y en general de un IoC para inversión de control, como lo nombran los Principios SOLID. Esto nos ayuda a utilizar interfaces / contratos, que quien los inyecta es alguien de infrastructra transversal que resuelve por nosotros las dependencias necesarias.
