Instalacion del proyecto
Instalar las dependencias pertenecientes al proyecto



Dentro del proyecto ejecutar los siguientes comandos:
composer install
cp .env.example .env
php artisan key:generate
php artisan jwt:secret

______________________________________________________________________________________
Para la Base de datos scheduledb es el monbre asignado
donde User es root y contraseña es basia

DB_DATABASE: scheduledb


se ejecuata el comando, esto con el fin de crear el usuario y generar el token

php artisan migrate --seed


y para correr la aplicación mandamos el comando 

php artisan serve

en este comando podemos ver las pruebas realizadas
http://localhost:8000/api/documentation

--- en posmant

![image](https://user-images.githubusercontent.com/42309437/160295893-059c342a-291b-4a9c-8ac2-6603f9e4067c.png)

donde se genera el token que debemos copiarlo 

CREAMOS EL CLIENTE

![image](https://user-images.githubusercontent.com/42309437/160295940-a877f0dd-ebd8-48d4-a564-f9bb71b7bee1.png)

VEMOS CLIENTES CREADOS

![image](https://user-images.githubusercontent.com/42309437/160296005-8216743b-83b5-4fe8-8230-181e9b678c9d.png)

CREAMOS LA AGENDA
![image](https://user-images.githubusercontent.com/42309437/160296019-634b9b26-25dd-417b-b8e9-21d5b42eab4d.png)

EDITAMOS LA AGENDA

![image](https://user-images.githubusercontent.com/42309437/160296038-95716dde-2a60-4f43-aa33-0f08ea9ce7f1.png)
