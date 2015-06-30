<?php

namespace DataLibrary\Validator;

use Exception;

class ValidationException extends \Exception {

    private $default_message = 'Error: Supplied input is invalid!';

    public $default_message_partial = 'Error: Invalid Data. ';

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