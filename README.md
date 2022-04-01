## Google Calendar Api Rest, Laravel and Mysql

A continuación, veremos un pequeño resumen de como implementar un crud de eventos de calendario sincronizado a la api rest de Google calendar.

## Creacion de proyecto y credenciales en la plataforma de google cloud

Para comenzar, antes que todo debemos acceder a la plataforma de Google cloud [Google Cloud](https://console.cloud.google.com), una vez ingresada a la plataforma con nuestra cuenta, procederemos a crear un nuevo proyecto en el cual deberemos otorgarle un nombre y a continuación tendremos que crear la pantalla de consentimiento la cual tendrá los usuarios de prueba que podrán ingresar a la plataforma, finalmente creamos las credenciales de acceso para poder acceder a la api(0Auth).

Luego de obtener la credenciales en formato json la almacenaremos en nuestro proyecto en un archivo llamado oauth-credentials.json(mi-proyecto-laravel-calendar\storage\app\google-calendar\oauth-credentials.json).Posteriormente si se quiere saber cómo creamos nuestros métodos para acceder a las funciones que nos otorga la api de Google calendar para realizar las gestiones que deseamos, podemos visualizar la documentación que entrega Google cloud [Google Cloud](https://developers.google.com/calendar/api/quickstart/php).

## Instalación de proyecto
***
Clonado o descargado el proyecto, ingresamos a este desde consola y procedemos a obtener el archivo vendor. 
```
$ composer update

```

***
Luego debemos crear un archivo .env el cual almacenara las variables globales que utilizaremos para acceder a la base de datos.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=googlecalendar
DB_USERNAME=root
DB_PASSWORD=

```
El nombre de la base de datos será googlecalendar

***
Terminado los pasos anteriores procedemos a migrar nuestras tablas a la base de datos (Mysql). 
```
$ php artisan migrate

```

***
A hora procedemos a correr nuestro proyecto. 
```
$ php artisan serve

```
## Ingreso a la plataforma

Accedemos a la plataforma en el navegador, visualizaremos la página de laravel y hora nos vamos a la esquina superior derecha e ingresamos. procedemos a crear un usuario para poder ingresar.

Una vez creado el usuario, nos pedirá ingresar con una cuenta.
La cuenta con la cual ingresaremos al sistema deberá estar registrada como cuenta de prueba, puesto que al ser un proyecto en desarrollo, no cuenta con acceso libre.

## Migración de eventos desde google calendar a base de datos

Ingresado en la plataforma, para poder migrar los eventos que tenemos en nuestro calendario de Google, basta con presionar el botón "Lista desde base de datos".

A hora cada vez que realicemos un evento crud, estos afectaran a los datos almacenados en la base de datos y los datos registrados en el calendario de Google.
