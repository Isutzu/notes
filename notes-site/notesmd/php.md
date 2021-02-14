![](https://github.com/Isutzu/notes/blob/master/images/php-logo.png?raw=true)

### PHP magic constants and methods

  `__CLASS__`: returns the name of the current class
  `__construct()`: constructor called automatillcally when an object is created (PHP 5 and up)
  `__destruct()` : destructor called automatically after object is no more in used (PHP 5 and up)
  `__get()`: functions as a getter on an object.
  `__set()`: functions as a setter for getting object data

### access modifiers
`private` :  access only inside the class
`protected` : access only within the class or classes that instantiate that class.
`public`

### example

```php
<?php

class User 
{
    private $name = "";
    private $age = "";

    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }
    
    public function __get($property)
    {
        if (property_exists($this, $property)){
            return $this->$property;        
        }
    }

    public function __set($property, $value)
    {
        if(property_exists($this, $property)){
            $this->$property = $value;
        }
        return $this;
    }
}

$user1 = new User("oscar",24);
echo $user1->__get("name");
//OUTPUT: oscar
 $user1->__set("name","juan");
 echo $user1->__get("name");
//OUTPUT: juan
?>
```
###  PHP project with MVC framework

``` 
public
    index.php // will load bootstrap.php
    css
    js
    images
app
    libraries
        core.php
        database.php
        controller.php
    models
    views
    controllers
    helpers
    config : database configuration
    .htaccess 
    bootstrap.php: will require all files we need (like a build)
```

`bootstrap.php` will load php files from library folder (libraries/Core.php ) which will get the url and reroute it the right controller to display the page
`Core.php will` will get the url through GET['url']
*.htaccess*
```
Options -Indexes: hide directory contents when the path is written in the browser.
Ex.
www.yourdomain/css

Options +Indexes : show the folders.
```
*.htaccess inside public folder* :Configure a php module to reroute any unknown page to index.php
```ruby
<IfModule mod_rewrite.c>
  Options -Multiviews
  RewriteEngine On
  RewriteBase /traversymvc/public
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteRule  ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
```
*.htaccess inside root folder* :Configure a php module to reroute any unknown page to public folder
```ruby
<IfModule mod_rewrite.c>
  Options -Multiviews
  RewriteEngine On
  RewriteBase /traversymvc/public
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteRule  ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
```

```php
    class foo {
    function bar($arg, $arg2) {
        echo __METHOD__, " got $arg and $arg2\n";
    }
}

// Call the $foo->bar() method with 2 arguments
$foo = new foo;
call_user_func_array(array($foo, "bar"), array("three", "four"));
?>

// OUTPUT:
//foo::bar got three and four

```

```php
    array_values($url)
    // re-index the values of $url array.
    //if $url[0], $url[1]  is unset and $url[2]='hello'
    //after array_values($url)
    // $url[0]= 'hello'
```
Note the values of each array is passed to each argument in the function.



*Resources:*

 [login with facebook](https://www.mitrajit.com/login-facebook-using-php-mysql/)
 [digital marketing](https://indemandcareer.com/)
 [php object oriented](https://code.tutsplus.com/tutorials/object-oriented-php-for-beginners--net-12762)