<?php

namespace DataLibrary\Validator;

use Mockery;
use DataLibrary\Validator\Config\Config;
use DataLibrary\Validator\Config\Validators as Validators;

/**
 * Class ConfigTest
 * @package DataLibrary\Validator
 */
class ConfigTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var
     */
    protected $config;

    /**
     * setup
     */
    public function setup()
    {
      $this->config = New Config(Validators);
    }

    /**
     * Cleanup needed for Mockery
     */
    public function tearDown()
    {
        Mockery::close();
        parent::tearDown();
    }


    /**
     * testHasKey
     *
     * @test
     */
    public function testHasKey()
    {
        $this->assertTrue($this->config->has('Object'));
    }
}
