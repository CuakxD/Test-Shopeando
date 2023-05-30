Readmi
Instalación:
Para instalar esta aplicación web, es necesario cumplir con los siguientes requerimientos:
Tener instalada una arquitectura WAMP o LAMP con lo siguiente:
Apache 2.4
PHP 7.4
mysql 5.7
Para su correcto funcionamiento se recomienda tener instaladas esas versiones.

---instalar la base de datos, se debe de ingresar a MYSQL (puede ser desde phpmyadmin o consola, aquí guiare los pasos en phpmyadmin).
Una vez conectado con las credenciales de MYSQL en phpmyadmin, se debe de hacer clic en importar, seleccionar el archivo llamado blog.sql y hacer clic en continuar, con esto la base de datos estará instalada correctamente.

---Instalar el proyecto
Para instalar el proyecto, se debe de ingresar a la ruta o al servidor donde se pueden ejecutar los proyectos web, en el caso de linux el directorio seria /var/www/html/
En el caso de windows, si se tiene instalado wamp por defecto es "C:\wamp64\www" , en caso de tener Laragon por defecto, la ruta es "C:\laragon\www".
Dentron de esta carpeta, copiaremos el archivo "Test Shopeando.rar" y lo extraeremos en esta ruta.

--Configuración de la base de datos en el proyecto
Una vez extraido el proyecto, se debe de entrar a la carpeta "Test Shopeando" y abrir el archivo "api.php" y reemplazar los siguientes valores:
$servidor= "localhost"; // Aca va la IP del servidor, si se monta de manera local, dejar 
$usuario = "root"; // Acá va el nombre de usuario MYSQL
$pass = ""; // Acá va la contraseña de MYSQL
$nombreBaseDatos = "blog" // Acá va el nombre de la base de datos, solo sustituir si se renombró la bd.


--Configuración para sacar a producción
los archivos 
index.php
form.php
details.php

Tienen la siguiente linea de código"http://localhost/Test%20Shopeando/api.php"
Reemplazar la url por la URL donde se quiere alojar la APi (La url donde se encuentra).

Si se realizo la instalación de manera local, no se deben de cambiar ninguno de los parametros a excepción de los parametros de la BD si tienen otras credenciales.

Ingresar a la página 
http://localhost/Test%20Shopeando
Para ver el resultado.