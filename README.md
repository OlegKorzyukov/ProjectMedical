STACK
============================================
* PHP -version 7.4.19
* Laravel -version 8.4
* MySQL -version 8.0
* Composer -version 2.0.14

INSTALL
============================================
1. Install PHP from https://www.php.net
2. Install Composer from https://getcomposer.org
3. Install MySQL from *https://www.mysql.com*
4. Install GIT from *https://git-scm.com*
5. Download project from Github to your work directory `git clone https://github.com/Vorbis95/ProjectMedical.git`
6. Go to project folder
7. If your Сomposer install in global scope, type `composer install`, else type `php bin/composer install`
8. Set your configuration in file '.env'
9. Type `php artisan migrate`to create database table
10. Type `php artisan key:generate`to set encryption key for sessions and cookies
11. Type `php artisan serve` to start server it standart url *http://127.0.0.1:8000*

API
============================================

Method - **GET**  
Endpoint - **api/v1/medicines**  
Return - **JSON**  
Status code - **200**  
Description - **Get all medicines essence**

**Input required:**  
*Header:*
   `Authorization: Bearer (your_token)`

**Output:**  
`[`   
   `"data": {`  
        `"id": (id),`  
        `"name": (string),`  
        `"substance_id": (id),`  
        `"manufacturer_id": (id),`  
        `"price": (int)`  
    `},`  
   `...`  
`]`

***

Method - **POST**  
Endpoint - **api/v1/medicines**  
Return - **JSON**  
Status code - **201**  
Description - **Insert new medicine essence in database**

**Input required:**  
*Header:*
   `Authorization: Bearer (your_token)`

**Output:**  
`{`  
   `'operation' => (string)',`  
   `'status' => (string),`  
   `'model' => (Object)`  
`}`

***

Method - **GET**  
Endpoint - **api/v1/medicines/{id}**  
Return - **JSON**  
Status code - **200**  
Description - **Get one medicine essence by id**

**Input required:**  
*Header:*
   `Authorization: Bearer (your_token)`

**Output:**  
`{`  
   `"data": {`  
      `"id": (id),`  
      `"name": (string),`  
      `"substance_id": (id),`  
      `"manufacturer_id": (id),`  
      `"price": (int)`  
   `}`  
`}`

***

Method - **PUT**  
Endpoint - **api/v1/medicines/{id}**  
Return - **JSON**  
Status code - **201**  
Description - **Update one medicine essence by id**

**Input required:**  
*Header:*
   `Authorization: Bearer (your_token)`

**Output:**  
`{`  
   `'operation' => (string),`  
   `'status' => (string),`  
   `'model' => (Object)`  
`}`

***

Method - **DELETE**  
Endpoint - **api/v1/medicines/{id}**  
Return - **JSON**  
Status code - **200**  
Description - **Delete one medicine essence by id**

**Input required:**  
*Header:*
   `Authorization: Bearer (your_token)`
   
**Output:**  
`{`  
   `'operation' => (string),`  
   `'status' => (string),`  
   `'model' => (Object)`  
`}`

***
### JWT ###

***
Method - **POST**  
Endpoint - **api/v1/auth/login**  
Return - **JSON**  
Status code - **200**  
Description - **Login with user email and password**

**Input required:**  
`{`  
   `"email": (string),`  
   `"password": (string)`  
`}`

**Output:**  
`{`  
    `"access_token": (string),`  
    `"token_type": "bearer",`  
    `"expires_in": (int)`  
`}`

***

Method - **POST**  
Endpoint - **api/v1/auth/logout**  
Return - **JSON**  
Status code - **200**  
Description - **Logout user**

**Input required:**  
*Header:*
   `Authorization: Bearer (your_token)`

**Output:**  
`{`  
    `"message": "Successfully logged out"`  
`}`  

***

Method - **POST**  
Endpoint - **api/v1/auth/me**  
Return - **JSON**  
Status code - **200**  
Description - **Get information about login user**

**Input required:**  
*Header:*
   `Authorization: Bearer (your_token)`

**Output:**  
`{`  
    `"message": "Successfully logged out"`  
`}`

***

Method - **POST**  
Endpoint - **api/v1/auth/refresh**  
Return - **JSON**  
Status code - **200**  
Description - **Refresh access token**  

**Input required:**  
*Header:*
   `Authorization: Bearer (your_token)`

**Output:**  
`{`  
    `"access_token": (string),`  
    `"token_type": "bearer",`  
    `"expires_in": (int)`  
`}`

***

Method - **POST**  
Endpoint - **api/v1/auth/register**  
Return - **JSON**  
Status code - **200**  
Description - **Refresh access token**  

**Input required:**  
*Header:*
   `Authorization: Bearer (your_token)`

`{`  
   `"name": (string),`  
   `"email": (string),`  
   `"password": (string),`  
   `"password_confirmation": (string)`  
`}`

**Output:**  
`{`  
    `"message": "User successfully registered",`  
    `"user": {`  
        `"name": (string),`  
        `"email": (string),`  
        `"updated_at": (string),`  
        `"created_at": (string),`  
        `"id": (int)`  
    `}`  
`}`  
