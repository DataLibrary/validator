<?php

namespace DataLibrary\Validator;

use Mockery;
use DataLibrary\Validator\Exceptions\ValidationException;
use DataLibrary\Validator\Facades\ValidatorFacade as Validator;

/**
 * Class ValidatorJsonTest
 * @package DataLibrary\Validator
 */
class ValidatorJsonTest extends \PHPUnit_Framework_TestCase
{

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
     *
     * @test
     */
    public function validateByJson()
    {
        //$this->assisTrue($this->validator->validateByJson($rules, $data));
    }

}
