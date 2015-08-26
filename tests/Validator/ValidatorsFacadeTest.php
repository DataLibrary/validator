<?php

namespace DataLibrary\Validator;

use Mockery;
use DataLibrary\Validator\Exceptions\ValidationException;
use DataLibrary\Validator\Facades\ValidatorsFacade as Validators;

/**
 * Class ValidatorsFacadeTest
 * @package DataLibrary\Validator
 */
class ValidatorsFacadeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Cleanup needed for Mockery
     */
    public function tearDown()
    {
        Mockery::close();
        parent::tearDown();
    }
}
