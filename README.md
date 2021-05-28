----------------------STACK---------------------------
PHP -version 7.4.19
Laravel -version 8.4
MySQL -version 8.0
Composer -version 2.0.14
--------------------------------START-------------------
1.Install PHP from https://www.php.net
2.Install Composer from https://getcomposer.org
3.Install MySQL from https://www.mysql.com
4.Install GIT from https://git-scm.com
5.Download project from Github to your work directory "git clone https://github.com/Vorbis95/TestProjectMedicalLaravel.git"
6.Go to project folder
7.If your Сomposer install in global scope, type 'composer install', else type 'php bin/composer install'
8.Set your configuration in file '.env'
9.Type 'php artisan migrate'
----------------------------------END---------------

--------------------------API-------------------------------
GET|HEAD | api/v1/medicines | medicines.index | App\Http\Services\MedicineApiService@index | api |
POST | api/v1/medicines | medicines.store | App\Http\Services\MedicineApiService@store | api |
GET|HEAD | api/v1/medicines/{medicine} | medicines.show | App\Http\Services\MedicineApiService@show | api |
PUT|PATCH | api/v1/medicines/{medicine} | medicines.update | App\Http\Services\MedicineApiService@update | api |
DELETE | api/v1/medicines/{medicine} | medicines.destroy | App\Http\Services\MedicineApiService@destroy | api
