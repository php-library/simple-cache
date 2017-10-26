<?php

namespace SimpleCache\Adapters;

use SimpleCache\Contracts\AdapterInterface;

/**
 * Class FileAdapter
 *
 * @package SimpleCache\Adapters
 */
class FileAdapter implements AdapterInterface
{
    /**
     * @var string
     */
    private $storagePath;

    /**
     * FileAdapter constructor.
     *
     * @param string $storagePath
     */
    public function __construct(string $storagePath)
    {
        $this->storagePath = $storagePath;
    }

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return bool
     */
    public function set(string $key, $value): bool
    {
        return file_put_contents($this->storagePath . $key, $value);
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return file_get_contents($this->storagePath . $key);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function delete(string $key): bool
    {
        return unlink($this->storagePath . $key);
    }

}
