<?php


use SimpleCache\SimpleCache;
use SimpleCache\Adapters\FileAdapter;

define('PROJECT_PATH', dirname( __DIR__));

require_once PROJECT_PATH . '/vendor/autoload.php';

$storagePath = PROJECT_PATH . '/_storage/';

if (!file_exists($storagePath)) {
    mkdir($storagePath);
}

$fileBasedStorage = new SimpleCache(new FileAdapter($storagePath));

$fileBasedStorage->save('testKey', 'test value');
printf('testKey saved in file based DB' . PHP_EOL);

$valueFromFileBased = $fileBasedStorage->retrieve('testKey');
printf($valueFromFileBased . ' is retrieved form file' . PHP_EOL);