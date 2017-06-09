About
==============

A simple configuration script to store values in an array, and return them using public static functions!

Got an email recently about this repository--its all but defunct and no longer necessary. A better approach would be to use `.env` variables. [Check out this project here](https://github.com/vlucas/phpdotenv)--and be sure to include `.env` to your `.gitignore`.

#### Index
* [Usage](#usage)
* [Classes](#classes)
  * [Set](#set)
  * [Get](#get)
  * [Return](#return)
  * [Init](#init)
  * [Update](#update)
* [Pull Requests and Support](#pulls-and-support)

Usage
==============

Ensure you have at least PHP version `5.4`;

Require or include the class file:

```php
require 'vendor/Config.php';
```

Create your configuration array:

```php
Config::init([
	'username' => 'user',
	'password' => 'password',
	'hostname' => 'localhost',
	'dbname'   => 'test',
	'database' => [
	    'hostname' => 'localhost',
	    'username' => 'username',
	    'password' => 'test',
	    'port' => 3306
    ]
]);
```

Then do stuff with your values:

```php
Config::get('username'); // contains 'user'
```

Or for multidimensional (init) arrays:

```php
Config::$instance->database{'password'}; // contains 'password'
```

Classes
==============

There are `5` classes of note, they are: `set`, `get`, `ret`, `init`, and `update`.

----------

#### Set
```php
public static function set($key, $val) {
  self::$config[$key] = $val;
}
```

Enables you to set a single key value pair.

```php
Config::set('username', 'zQueal');
```

----------

#### Get
```php
public static function get($key) {
	self::$config[$key];
}
```

Enables you to 'test' a single key pair value. `Config::get()` will not longer return a value. See [Config::ret()](#ret).

```php
if(Config::get('username') == $value){
	doStuff();
}
```

----------

#### Return
```php
public static function ret($key) {
  print self::$config[$key];
}
```

Returns (print) a single key pair value.

```php
Config::ret('username'); // returns stored value
```

----------

#### Init
```php
public static function init($a) {
  self::$config = $a;
  self::$instance = new Config();
}
```

Enables you to set multiple key value pairs in a single function, and create multidimensional values.

```php
Config::init([
	'username' => 'username',
	'password' => 'password',
	'directory' => '/home/zqueal',
	'about' => [
		'name' => 'Zach Q',
		'email' => 'zach.queal@gmail.com',
		'color' = 'blue'
	]
]);
```

Once your function call has been executed, all the variables will be able to be used in the rest of your script / application. To call a single (top nested) key value pair, use the `Config::get('directory'); // contains /home/zqueal` static function call. If you're trying to access a nested key value pair, then you need to use the static object method `Config::$instance->about{'name'} // returns 'Zach Q'`.

----------

#### Update
```php
public static function update($a) {
	self::$config = array_merge(self::$config, $a);
}
```

A function to update already created values.

```php
Config::set('name', 'Zach Q');
Config::ret('name'); // returns 'Zach Q'
Config::update('name', 'Other Name');
Config::ret('name'); // returns 'Other Name'
```

Pulls and Support
==================
I do not maintain this repository. If you have an improvement I'm open to pull requests, but I do not offer support.