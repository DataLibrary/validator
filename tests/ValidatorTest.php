<?php

namespace DataLibrary\Validator;

use Mockery;
use DataLibrary\Validator\Validator;
use DataLibrary\Validator\ValidationException;

class ValidatorTest extends \PHPUnit_Framework_TestCase {

    protected  $validator;

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
}
