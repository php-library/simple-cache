<?php

use App\Storage;
use App\Storage\RedisAdapter;

define('PROJECT_PATH', dirname( __DIR__));

require_once PROJECT_PATH . '/vendor/autoload.php';

$storagePath = PROJECT_PATH . '/_storage/';

$redisHost = '127.0.0.1';
$redisPort = '6379';
$redisTimeout = '2';
$redisDatabaseId = 1;

$redisAdapter = new RedisAdapter($redisHost, $redisPort, $redisDatabaseId, $redisTimeout);

$redisBasedStorage = new Storage($redisAdapter);

$redisBasedStorage->save('somekey', 'somevalue');
$result = $redisBasedStorage->retrieve('somekey');