# Pasos para la ejecución de la API:
- Clonar el proyecto en local
- Crear una base de datos en MYSQL con el nombre api_registration. Se puede utilizar el servicio que ofrece Xampp. Verificar que el motor esté corriendo en el puerto 3306. O simplemente dejar que el programa la cree al usar el comando ```php artisan migrate```
- Si no se hizo en el paso anterior, ejecutar el comando ```php artisan migrate```
- Ejecutar el comando ```php artisan db:seed CityTableSeeder``` para generar las ciudades
- Ejecutar el comando ```php artisan db:seed DocumentTypeTableSeeder``` para generar los tipos de identificación

- Ejecutar el comando ```php artisan serve``` para correr el servidor

# Documentación de los endpoints
- GET api/cities ➜ Devuelve todas las ciudades
- GET api/document_types ➜ Devuelve todos los tipos de documento
- GET api/users ➜ Devuelve todos los usuarios
- GET api/users/{id} ➜ Devuelve un usuario en específico
- POST api/users ➜ Almacena un usuario con un body como el siguiente
  ```
      {
          "id_document_type": "1",
          "document_number": "1111111111",
          "names": "nombres",
          "last_name": "apellido",
          "middle_name": "apellido",
          "born_date": "2023-09-23 00:000:00",
          "id_city": "1",
          "email": "prueba@mail.com",
          "password": "password"
      }
  ```
- GET api/users?last_name=value&names=value&document_number=value&id_city=value ➜ Devuelve los usuarios que cumplan con los filtros del query:
  ```
      last_name
      names
      document_number
      id_city
  ```
- PUT api/users/{id} ➜ Actualiza el usuario con la id dada, utilizando el body de la forma del POST
- DELETE api/users/{id} ➜ Elimina a un usuario por Soft Delete, colocándole el atributo deleted_at
