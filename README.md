----------------------STACK---------------------------
PHP -version 7.4.19
Laravel -version 8.4
MySQL -version 8.0
Composer -version 2.0.14
--------------------------------INSTALL---------------
1.Install PHP from https://www.php.net
2.Install Composer from https://getcomposer.org
3.Install MySQL from https://www.mysql.com
4.Install GIT from https://git-scm.com
5.Download project from Github to your work directory "git clone https://github.com/Vorbis95/TestProjectMedicalLaravel.git"
6.Go to project folder
7.If your Сomposer install in global scope, type 'composer install', else type 'php bin/composer install'
8.Set your configuration in file '.env'
9.Type 'php artisan migrate'

--------------------------API------------------------
Method - GET | Endpoint - api/v1/medicines | Get all medicines
Method - POST | Endpoint - api/v1/medicines | Insert new medicine essence in database
Method - GET | Endpoint - api/v1/medicines/{id} | Get one medicine essence by id
Method - PUT | Endpoint - api/v1/medicines/{id} | Update one medicine essence by id
Method - DELETE | Endpoint - api/v1/medicines/{id} | Delete one medicine essence by id
