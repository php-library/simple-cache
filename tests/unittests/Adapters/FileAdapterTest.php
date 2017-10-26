<?php

namespace SimpleCache\Adapters;

use PHPUnit\Framework\TestCase;

function file_put_contents(){
    return true;
};

function file_get_contents(){
    return FileAdapterTest::$testValue;
};

/**
 * Class FileAdapterTest
 *
 * @package SimpleCache\Adapters
 */
class FileAdapterTest extends TestCase
{
    public static $storagePath;

    public static $testValue;

    public static $testKey;

    protected function setUp()
    {
        parent::setUp();
        self::$storagePath = dirname(__DIR__) . '/../../_storage/';
    }

    /**
     * @test
     */
    public function set_test()
    {
        $classUnderTest = new FileAdapter(self::$storagePath);

        $testValue = 'test value';
        self::$testValue = $testValue;
        $testKey = 'testKey';
        self::$testKey = $testKey;

        $classUnderTest->set($testKey, $testValue);

        $result = $classUnderTest->get($testKey);

        $this->assertEquals($testValue, $result);
    }
}
