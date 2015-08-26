<?php

namespace DataLibrary\Validator;

use DataLibrary\Validator\Config;

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
      $this->config = New Config();
    }
    
    /**
     * Cleanup needed for Mockery
     */
    public function tearDown()
    {
        Mockery::close();
        parent::tearDown();
    }
}
