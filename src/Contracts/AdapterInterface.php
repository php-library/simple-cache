<?php

namespace SimpleCache\Contracts;

/**
 * Interface AdapterInterface
 *
 * @package SimpleCache
 */
interface AdapterInterface
{
    /**
     * @param string $key
     * @param mixed $value
     *
     * @return bool
     */
    public function set(string $key, $value): bool ;

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key);

    /**
     * @param string $key
     *
     * @return bool
     */
    public function delete(string $key): bool ;

}
