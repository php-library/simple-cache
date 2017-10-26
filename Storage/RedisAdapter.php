<?php

namespace App\Storage;

/**
 * Class RedisAdapter
 *
 * @package App\Storage
 */
class RedisAdapter implements AdapterInterface
{
    /**
     * @var \Redis
     */
    private $redis;

    /**
     * RedisAdapter constructor.
     *
     * @param $host
     * @param int $port
     * @param $databaseId
     * @param int $timeout
     * @internal param \Redis $redis
     */
    public function __construct($host, $port = 6379, $databaseId, $timeout = 2)
    {
        $this->redis = new \Redis();
        $this->redis->connect($host, $port, $timeout);
        $this->redis->select($databaseId);
    }

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return bool
     */
    public function set(string $key, $value): bool
    {
        return $this->redis->set($key, $value);
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->get($key);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function delete(string $key): bool
    {
        return $this->delete($key);
    }

}
