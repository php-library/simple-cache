<?php

use App\Storage;
use App\Storage\FileAdapter;
use App\Storage\MemcachedAdapter;

require_once 'vendor/autoload.php';

define('PROJECT_PATH', __DIR__);

$storagePath = PROJECT_PATH . '/_storage/';

//$fileBasedStorage = new Storage(new FileAdapter($storagePath));
//
//$fileBasedStorage->save('testKey', 'test value');
//printf('testKey saved in file based DB' . PHP_EOL);
//
//$memcacheInstance= new Memcached();
//$memcacheInstance->addServer('localhost', 11211);
//
//$memcachedBasedStorage = new Storage(new MemcachedAdapter($memcacheInstance));
//
//$result = $memcachedBasedStorage->save('testKeyInMemcached', 'test value in memcached');
//printf('testKeyInMemcached saved in Memcached based DB' . PHP_EOL);
//var_dump($result);
//
//
//$valueFromFileBased = $fileBasedStorage->retrieve('testKey');
//printf($valueFromFileBased . ' is retrieved form file' . PHP_EOL);
//
//$valueFromMemcachedBased = $memcachedBasedStorage->retrieve('testKeyInMemcached');
//printf($valueFromMemcachedBased . ' is retrieved form memcached' . PHP_EOL);

$redisHost = '127.0.0.1';
$redisPort = '6379';
$redisTimeout = '2';
$redisDatabaseId = 1;

$redisAdapter = new Storage\RedisAdapter($redisHost, $redisPort, $redisDatabaseId, $redisTimeout);

$redisBasedStorage = new Storage($redisAdapter);

$redisBasedStorage->save('somekey', 'somevalue');
$result = $redisBasedStorage->retrieve('somekey');
echo $result;