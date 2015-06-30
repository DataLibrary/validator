<?php

namespace DataLibrary\Validator;

use DataLibrary\Validator\ValidationException;

abstract class AbstractValidator implements ValidatorInterface
{

    public function validate($type, $data, $mayBeNull = false, $mayBeEmpty = false, $exceptions = true)
    {
       return $this->validation($type, $data, $mayBeNull, $mayBeEmpty, $exceptions);
    }

    public function isValid($type, $data, $mayBeNull = false, $mayBeEmpty = false, $exceptions = true)
    {
        return $this->validation($type, $data, $mayBeNull, $mayBeEmpty, $exceptions);
    }

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

    protected function isNull($data, $exceptions)
    {
        if (is_null($data)) {
            $this->throwException($data, ' $data is Null', $exceptions);
            return true;
        }
        return false;
    }

    protected function isEmpty($data, $exceptions)
    {
        if ($data == '') {
            $this->throwException($data, ' $data is Empty', $exceptions);
            return true;
        }
        return false;
    }

    protected function isOfCorrectType($data, $type, $exceptions)
    {
        if (gettype($data) == 'object') {
            if ($this->isCorrectObject($data, $type)) {
                return true;
            }
        } elseif ($this->isCorrectPrimitive($data, $type)) {
            return true;
        } else {
            $this->throwException($data, 'is not of type ' . $type, $exceptions);
            return false;
        }

    }

    protected function isCorrectPrimitive($data, $type)
    {
        if (gettype($data) == $type) {
           return true;
        }
        return false;
    }

    protected function isCorrectObject($data, $type)
    {
        if ($data instanceof $type) {
            return false;
        }
        return true;
    }

    protected function throwException($data, $message, $exceptions)
    {
        if ($exceptions) {
            throw new ValidationException($data, $message);
        }
    }

}