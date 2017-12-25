### Install Webpack

**Create folders**

~~~
./assets/js
./assets/css
~~~

**Create files**

~~~
./assets/js/app.js
./assets/css/app.css
~~~

**Add Webpack Encore**

~~~
yarn add @symfony/webpack-encore --dev
~~~

**Create the file**

~~~
./webpack.config.js
~~~

**When files above is create and often**
~~~
yarn run encore dev
~~~

**Install many dependencies**

~~~
npm install --save jquery
yarn add jquery --dev
yarn run encore dev
yarn add bootstrap
yarn run encore dev
~~~

##Doctrine
~~~
composer require doctrine maker
---
composer require --dev doctrine/doctrine-fixtures-bundle
---
php bin/console doctrine:database:create
---
php bin/console doctrine:migrations:diff
---
php bin/console doctrine:migrations:migrate
---
php bin/console doctrine:fixtures:load
---
composer require doctrine/doctrine-migrations-bundle "^1.0"
---
php app/console doctrine:schema:update --force
~~~
_Make a request in console_
~~~
php bin/console doctrine:query:sql 'SELECT * FROM product'
~~~


##FOSUserBundle

~~~
composer require friendsofsymfony/user-bundle "~1.3"
~~~


**Controller**
~~~
php bin/console make:controller NameController
~~~
