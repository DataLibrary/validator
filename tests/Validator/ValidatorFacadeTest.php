<?php 

 namespace DataLibrary\Validator;

 use Mockery;
 use DataLibrary\Validator\Exceptions\ValidationException;
 use DataLibrary\Validator\Facades\ValidatorFacade as Validator;

 /**
  * Class ValidatorFacadeTest
  * @package DataLibrary\Validator
  */
 class ValidatorFacadeTest extends \PHPUnit_Framework_TestCase {

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
        $this->assertTrue(Validator::validate($type = 'string', $data = 'this is a string'));
    }

    /**
     * @test
     */
    public function testIsValidTrue()
    {
        $this->assertTrue(Validator::isValid($type = 'string', $data = 'this is a string'));
    }

    /**
     * @test
     */
    public function testIsValidMayBeNull()
    {
        $this->assertTrue(Validator::isValid($type = 'string', $data = null, $mayBeNull = true));
    }

    /**
     * @test
     */
    public function testIsValidMayBeEmpty()
    {
        $this->assertTrue(Validator::isValid($type = 'string', $data = '', $mayBeNull = false, $mayBeEmpty = true));
    }

    /**
     * @test
     * @expectedException DataLibrary\Validator\Exceptions\ValidationException
     */
    public function testIsValidMayBeEmptyError()
    {
        $this->assertFalse(Validator::isValid($type = 'string', $data = ''));
    }

    /**
     * @test
     * @expectedException DataLibrary\Validator\Exceptions\ValidationException
     */
    public function testIsValidMayBeNullError()
    {
        $this->assertFalse(Validator::isValid($type = 'string', $data = null));
    }

    /**
     * @test
     * @expectedException DataLibrary\Validator\Exceptions\ValidationException
     */
    public function testIsValidWrongTypeError()
    {
        $this->assertFalse(Validator::isValid($type = 'integer', $data = 'string me'));
    }

    /**
     * @test
     */
    public function testIsValidObject()
    {
        $this->assertTrue(Validator::isValid($type = 'Mockery\Mock', $data = new Mockery\Mock()));
    }

    /**
     * @test
     * @expectedException DataLibrary\Validator\Exceptions\ValidationException
     */
    public function testIsValidWrongObjectTypeError()
    {
        $this->assertFalse(Validator::isValid($type = 'Validator', $data = new Mockery\Mock()));
    }
}
