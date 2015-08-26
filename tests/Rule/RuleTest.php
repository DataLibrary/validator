<?php

namespace DataLibrary\Validator;

use DataLibrary\Validator\Rules\Rule;
use Mockery;

/**
 * Class RuleTest
 * @package DataLibrary\Validator
 */
class RuleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var
     */
    protected  $rule;

    /**
     * setUp
     */
    public function setUp()
    {
        $this->rule = new Rule();
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
     * testConstructor
     *
     * @test
     */
    public function testConstructor()
    {
        $this->assertInstanceOf('DataLibrary\Validator\Rules\Rule', $this->rule);
    }

}
