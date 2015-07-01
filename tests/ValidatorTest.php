<?php

namespace DataLibrary\Validator;

use Mockery;
use DataLibrary\Validator\Validator;
use DataLibrary\Validator\ValidationException;

/**
 * Class ValidatorTest
 * @package DataLibrary\Validator
 */
class ValidatorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var
     */
    protected  $validator;

    /**
     * setUp
     */
    public function setUp()
    {
        $this->validator = new Validator();
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
     * @test
     */
    public function testValidateTrue()
    {
        $this->assertTrue($this->validator->validate($type = 'string', $data = 'this is a string'));
    }

    /**
     * @test
     */
    public function testIsValidTrue()
    {
        $this->assertTrue($this->validator->isValid($type = 'string', $data = 'this is a string'));
    }

    /**
     * @test
     */
    public function testIsValidMayBeNull()
    {
        $this->assertTrue($this->validator->isValid($type = 'string', $data = null, $mayBeNull = true));
    }

    /**
     * @test
     */
    public function testIsValidMayBeEmpty()
    {
        $this->assertTrue($this->validator->isValid($type = 'string', $data = '', $mayBeNull = false, $mayBeEmpty = true));
    }

    /**
     * @test
     * @expectedException DataLibrary\Validator\ValidationException
     */
    public function testIsValidMayBeEmptyError()
    {
        $this->assertFalse($this->validator->isValid($type = 'string', $data = ''));
    }

    /**
     * @test
     * @expectedException DataLibrary\Validator\ValidationException
     */
    public function testIsValidMayBeNullError()
    {
        $this->assertFalse($this->validator->isValid($type = 'string', $data = null));
    }

    /**
     * @test
     * @expectedException DataLibrary\Validator\ValidationException
     */
    public function testIsValidWrongTypeError()
    {
        $this->assertFalse($this->validator->isValid($type = 'integer', $data = 'string me'));
    }

    /**
     * @test
     */
    public function testIsValidObject()
    {
        $this->assertTrue($this->validator->isValid($type = 'Mockery\Mock', $data = new Mockery\Mock()));
    }

    /**
     * @test
     * @expectedException DataLibrary\Validator\ValidationException
     */
    public function testIsValidWrongObjectTypeError()
    {
        $this->assertFalse($this->validator->isValid($type = 'Validator', $data = new Mockery\Mock()));
    }
}
