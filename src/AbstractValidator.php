<?php

namespace DataLibrary\Validator;

use DataLibrary\Validator\ValidationException;

/**
 * Class AbstractValidator
 * @package DataLibrary\Validator
 * @author James Johnson james.johnson@excellentingenuity.com
 * @license MIT
 * @copyright 2015 by ExcellentInGenuity LLC
 */
abstract class AbstractValidator implements ValidatorInterface
{

    /**
     * validate
     * @param      $type
     * @param      $data
     * @param bool $mayBeNull
     * @param bool $mayBeEmpty
     * @param bool $exceptions
     * @return bool
     */
    public function validate($type, $data, $mayBeNull = false, $mayBeEmpty = false, $exceptions = true)
    {
       return $this->validation($type, $data, $mayBeNull, $mayBeEmpty, $exceptions);
    }

    /**
     * isValid
     * @param      $type
     * @param      $data
     * @param bool $mayBeNull
     * @param bool $mayBeEmpty
     * @param bool $exceptions
     * @return bool
     */
    public function isValid($type, $data, $mayBeNull = false, $mayBeEmpty = false, $exceptions = true)
    {
        return $this->validation($type, $data, $mayBeNull, $mayBeEmpty, $exceptions);
    }

    /**
     * validation
     * @param $type
     * @param $data
     * @param $mayBeNull
     * @param $mayBeEmpty
     * @param $exceptions
     * @return bool
     */
    protected function validation($type, $data, $mayBeNull, $mayBeEmpty, $exceptions)
    {
        if ($mayBeNull == false) {
            if ($this->isNull($data, $exceptions))
            {
                return false;
            }

            if ($this->isOfCorrectType($data, $type, $exceptions) != true)
            {
                return false;
            }
            if ($mayBeEmpty == false) {
                if ($this->isEmpty($data, $exceptions)) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * isNull
     * @param $data
     * @param $exceptions
     * @return bool
     * @throws \DataLibrary\Validator\ValidationException
     */
    protected function isNull($data, $exceptions)
    {
        if (is_null($data)) {
            $this->throwException($data, ' $data is Null', $exceptions);
            return true;
        }
        return false;
    }

    /**
     * isEmpty
     * @param $data
     * @param $exceptions
     * @return bool
     * @throws \DataLibrary\Validator\ValidationException
     */
    protected function isEmpty($data, $exceptions)
    {
        if ($data == '') {
            $this->throwException($data, ' $data is Empty', $exceptions);
            return true;
        }
        return false;
    }

    /**
     * isOfCorrectType
     * @param $data
     * @param $type
     * @param $exceptions
     * @return bool
     * @throws \DataLibrary\Validator\ValidationException
     */
    protected function isOfCorrectType($data, $type, $exceptions)
    {
        if (is_object($data)) {
            if ($this->isCorrectObject($data, $type)) {
                return true;
            }
        } elseif ($this->isCorrectPrimitive($data, $type)) {
            return true;
        }

        $this->throwException($data, 'is not of type ' . $type, $exceptions);
        return false;

    }

    /**
     * isCorrectPrimitive
     * @param $data
     * @param $type
     * @return bool
     */
    protected function isCorrectPrimitive($data, $type)
    {
        if (gettype($data) == $type) {
           return true;
        }
        return false;
    }

    /**
     * isCorrectObject
     * @param $data
     * @param $type
     * @return bool
     */
    protected function isCorrectObject($data, $type)
    {
        if ($data instanceof $type) {
            echo get_class($data) . "\n";
            echo $type . "\n";
            return true;
        }
        return false;
    }

    /**
     * throwException
     * @param $data
     * @param $message
     * @param $exceptions
     * @throws \DataLibrary\Validator\ValidationException
     */
    protected function throwException($data, $message, $exceptions)
    {
        if ($exceptions) {
            throw new ValidationException($data, $message);
        }
    }

}