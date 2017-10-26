<?php

namespace App;

use App\Storage\AdapterInterface;

/**
 * Class Storage
 *
 * @package App
 */
class Storage
{
    /**
     * @var AdapterInterface
     */
    private $adapter;

    /**
     * @var null|string
     */
    private $extension = '.txt';

    /**
     * Storage constructor.
     *
     * @param AdapterInterface $adapter
     * @param string|null $extension
     */
    public function __construct(AdapterInterface $adapter, string $extension = null)
    {
        $this->adapter = $adapter;

        if ($extension) {
            $this->extension = $extension;
        }
    }

    /**
     * @param string $key
     * @param $value
     *
     * @return bool
     */
    public function save(string $key, $value)
    {
        return $this->adapter->set($key, $value);
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function retrieve(string $key)
    {
        return $this->adapter->get($key);
    }

}
