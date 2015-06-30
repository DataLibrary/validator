<?php

namespace DataLibrary\Validator;

interface ValidatorInterface
{
    public function validate($type, $data, $mayBeNull = false, $mayBeEmpty = false, $exceptions = true);

    public function isValid($type, $data, $mayBeNull = false, $mayBeEmpty = false, $exceptions = true);
}