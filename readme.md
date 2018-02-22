# Contact status laravel application by LICT TUP OFF - UY-23   

Its build with latest laravel 5.6 and modern css framework materialize css. User can track their activity with contacts. They can store contact information and keep status for contacts.  


# Technology
* Bootstrap
* Materialize css
* Laravel

# How to run this project
#### First clone project from github and cd into this project inside terminal

~~~bash
git clone https://github.com/poloey/laravel-material-contact-app.git
cd laravel-material-contact-app
~~~

#### Downloading composer package  and dumping
~~~bash
composer install
composer dump-autoload
~~~

### make uploads folder for avatar uploads 

~~~php
mkdir public/images/uploads/
~~~

#### Configure project by resetting old data and generating new key
~~~php
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan key:generate
~~~
### Create a database name with `contact` 
~~~bash
php artisan migrate
~~~

### seed database with dummy data 

~~~bash
php artisan db:seed
~~~

### Serving laravel project
~~~
php artisan serve
~~~

Take care 
