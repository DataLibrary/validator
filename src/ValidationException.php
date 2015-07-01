<?php

namespace DataLibrary\Validator;

use Exception;

/**
 * Class ValidationException
 * @package DataLibrary\Validator
 * @author James Johnson james.johnson@excellentingenuity.com
 * @license MIT
 * @copyright 2015 by ExcellentInGenuity LLC
 */
class ValidationException extends \Exception {

    /**
     * @var string
     */
    private $default_message = 'Error: Supplied input is invalid!';

    /**
     * @var string
     */
    public $default_message_partial = 'Error: Invalid Data. ';

    /**
     * @param string     $data
     * @param int        $message
     * @param int        $code
     * @param \Exception $previous
     */
    public function __construct($data, $message, $code = 0, Exception $previous = null)
    {
        $errorMessage = '';
        if ($message == null || '') {
            $errorMessage = $this->default_message;
        } else {
            $errorMessage = $this->default_message_partial . strval($data) .''. $message;
        }
        parent::__construct($errorMessage, $code, $previous);
    }
}