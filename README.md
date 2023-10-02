# Pasos para la ejecución de la API:
- Clonar el proyecto en local
- Crear una base de datos en MYSQL con el nombre api_registration. Se puede utilizar el servicio que ofrece Xampp. Verificar que el motor esté corriendo en el puerto 3306. O simplemente dejar que el programa la cree al usar el comando ```php artisan migrate```
- Si no se hizo en el paso anterior, ejecutar el comando ```php artisan migrate```
- Ejecutar el comando ```php artisan db:seed CityTableSeeder``` para generar las ciudades
- Ejecutar el comando ```php artisan db:seed DocumentTypeTableSeeder``` para generar los tipos de identificación

- Ejecutar el comando ```php artisan serve``` para correr el servidor