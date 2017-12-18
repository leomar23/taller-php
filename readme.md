# Taller PHP - Laravel Framework


| Plugin | README |
| ------ | ------ |
| Laravel 5 Repositories | [github.com/andersao/l5-repository](https://github.com/andersao/l5-repository) |
| Entrust | [github.com/Zizaco/entrust](https://github.com/Zizaco/entrust) |
| JsValidation| [github.com/proengsoft/laravel-jsvalidation](https://github.com/proengsoft/laravel-jsvalidation) |
| ---- | ---- |
| ---- | ---- |
| ---- | ---- |

El framework usado para el proyecto es Laravel 5.3, requerimientos para la instalación:
  - Composer
  - Servidor web (wamp, lamp, ext)
  - Sublime text o PHP Storm

## Instalación

### Git
Descargar el repositorio y colocarlos en la carpeta www (wamp) del servicio web
### Composer
Situarse en la carpeta del proyecto y ejecutar el siguiente comando:
```shell 
composer install
```
Este comando se encarga de descargar los plugins y componentes anotados en `composer.json`

### Laravel


- Copiar el archivo `.env.example` y renombrarlo a `.env` 
- Crear la base de datos con el mismo nombre que se encuentra dentro del arvhivo `.env`
de la opción `DB_DATABASE`
- Configurar los datos de la conexión a la base de datos:  `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- Crear en phpMyAdmin la base de datos: db_Taller

##### Migraciones
#

Comando para ejecutar todas las migraciones, esto genera la base de datos.

```php
php artisan migrate
```
El comando migrate:refresh restaurará todas sus migraciones y ejecutará el comando migrate. Este comando recrea efectivamente toda la base de datos:

```php
php artisan migrate:refresh
```
Actualiza la base de datos y ejecuta todas las semillas ...

```php
php artisan migrate:refresh --seed
```

##### Seeders (Semillas)
#

El comando `db:seed` ejecuta la clase `DatabaseSeeder`, que puede utilizarse para llamar a otras clases de semilla. Sin embargo, puede utilizar la opción --class para especificar una clase de sembradora específica para ejecutarse individualmente:

```php
php artisan db:seed

php artisan db:seed --class=DatabaseSeeder
```


Publish Configuration

```shell
php artisan vendor:publish 
```

Con respecto a la recuperación de la contrasña, se configuró mailtrap.io como correo para recibir el link.
Las credenciales para acceder a dicha casilla son: ignacio.uru@gmail.com / pass: tallerphp2017
