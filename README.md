PHP library to deal with fast and simple cache solutions with multiple adapter options.

# Installation
```
composer require ismatkurt/php-simple-cache
```

# Examples
Detailed examples can be found in "examples/" directory

### File Cache Example

In order to create a SimpleCache instance, we need Adapter instance.

Make sure your storagePath exists and accessible.

##### Creating SimpleCache instance
```
$fileAdapter = new FileAdapter($storagePath);

$fileBasedStorage = new SimpleCache($fileAdapter);
```

##### Saving a new record
```
$fileBasedStorage->save('testKey', 'test value');
```

##### Retrieve a record from SimpleCache
```
$valueFromFileBased = $fileBasedStorage->retrieve('testKey');
printf($valueFromFileBased);
```

Above code will print "test value".

### Redis Cache Example
Redis Adapter expects 4 parameter which are:
- host
- port
- databaseId
- timeout

##### Creating redis adapter
```
$redisAdapter = new RedisAdapter($redisHost, $redisPort, $redisDatabaseId, $redisTimeout);
```

##### Creating SimpleCache for Redis Cache manipulation
```
$redisBasedStorage = new SimpleCache($redisAdapter);
```

##### Saving a new record
```
$redisBasedStorage->save('somekey', 'somevalue');
```

##### Retrieve a record from SimpleCache
```
$result = $redisBasedStorage->retrieve('somekey');
```

### Memcache Example

In order to create a Memcahce SimpleCache instance we need to pass Memcache Instance to Adapter.

```
$memcacheInstance= new Memcached();
$memcacheInstance->addServer('localhost', 11211);
```

##### Creating SimpleCache for Memcache manipulation
```
$memcachedBasedStorage = new SimpleCache(new MemcachedAdapter($memcacheInstance));
```

##### Saving a new record
```
$result = $memcachedBasedStorage->save('testKeyInMemcached', 'test value in memcached');
```

##### Retrieve a record from SimpleCache
```
$valueFromMemcachedBased = $memcachedBasedStorage->retrieve('testKeyInMemcached');
```


