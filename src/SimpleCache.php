<?php

namespace SimpleCache;

use SimpleCache\Contracts\AdapterInterface;

/**
 * Class SimpleCache
 *
 * @package SimpleCache
 */
class SimpleCache
{
    /**
     * @var AdapterInterface
     */
    private $adapter;

    /**
     * @var null|string
     */
    private $fileExtension = '.txt';

    /**
     * SimpleCache constructor.
     *
     * @param AdapterInterface $adapter
     * @param string|null $fileExtension
     */
    public function __construct(AdapterInterface $adapter, string $fileExtension = null)
    {
        $this->adapter = $adapter;

        if ($fileExtension) {
            $this->fileExtension = $fileExtension;
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
