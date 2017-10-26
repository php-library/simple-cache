<?php

namespace SimpleCache\Adapters;

use Memcached;
use SimpleCache\Contracts\AdapterInterface;

/**
 * Class MemcachedAdapter
 *
 * @package SimpleCache\Adapters
 */
class MemcachedAdapter implements AdapterInterface
{
    /**
     * @var Memcached
     */
    private $memcached;

    /**
     * MemcachedAdapter constructor.
     *
     * @param Memcached $memcached
     */
    public function __construct(Memcached $memcached)
    {
        $this->memcached = $memcached;
    }

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return bool
     */
    public function set(string $key, $value): bool
    {
        return $this->memcached->set($key, $value);
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->memcached->get($key);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function delete(string $key): bool
    {
        return $this->memcached->delete($key);
    }

}
