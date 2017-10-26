<?php

use App\Storage;
use App\Storage\MemcachedAdapter;

define('PROJECT_PATH', dirname( __DIR__));

require_once PROJECT_PATH . '/vendor/autoload.php';

$memcacheInstance= new Memcached();
$memcacheInstance->addServer('localhost', 11211);

$memcachedBasedStorage = new Storage(new MemcachedAdapter($memcacheInstance));

$result = $memcachedBasedStorage->save('testKeyInMemcached', 'test value in memcached');
printf('testKeyInMemcached saved in Memcached based DB' . PHP_EOL);

$valueFromMemcachedBased = $memcachedBasedStorage->retrieve('testKeyInMemcached');
printf($valueFromMemcachedBased . ' is retrieved form memcached' . PHP_EOL);