# A symfony4 base project

###STEP1:

**Create**
~~~
composer create-project symfony/skeleton my-project
~~~
**Checking for Security Vulnerabilities**
~~~
composer require sec-checker
~~~
**Create basic .htaccess**
~~~
composer require symfony/apache-pack
~~~
**Many own requires**
~~~
composer require annotations
composer require --dev profiler
composer require twig
composer require asset
~~~

### Few tips
~~~
php bin/console debug:router
~~~

