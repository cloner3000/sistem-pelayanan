# Service System
This service system is designed to make it easier for people to make administrative letters such as birth certificates, marriage letters, etc. based on laravel 5.5.
## What you need to install
- [MySql-Server](https://dev.mysql.com/downloads/mysql/)
- [Composer](https://getcomposer.org/)
- [PHP >= 7.0](www.php.net/)
- [Git-CLI](https://git-scm.com/downloads)
- [NIAT](https://id.wikipedia.org/wiki/Niat)

## How To Install
1. Download this repository using git-CLI : `git clone https://github.com/dekiakbar/sistem-pelayanan`
2. Change the directory to the project folder : `cd sistem-pelayanan`
3. Then install the composer, type this command on your terminal : `composer install`
4. Skip this step if you are using window : `cp .env.example .env` 
5. Then open the .env file and fill it with your database name, database user, and database password.
6. Run this command to generate new key : `php artisan key:generate`
7. And finally run this command to generate database table and dummy data : `php artisan migrate --seed`
8. Enjoy :D

## User and Password
1. Kepala Desa 
	- email : superadmin@superadmin.com 
	- pass : superadmin123
2. Superadmin 
	- email : admin@admin.com 
	- pass : admin123
1. User 
	- email : user@user.com 
	- pass : user123

## Warning
1. This Project is free for use. 
3. **Always Use With Your Own Risk**
