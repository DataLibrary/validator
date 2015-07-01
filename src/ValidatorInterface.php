<?php

namespace DataLibrary\Validator;

/**
 * Interface ValidatorInterface
 * @package DataLibrary\Validator
 */
interface ValidatorInterface
{

    /**
     * validate
     * @param      $type
     * @param      $data
     * @param bool $mayBeNull
     * @param bool $mayBeEmpty
     * @param bool $exceptions
     * @return mixed
     */
    public function validate($type, $data, $mayBeNull = false, $mayBeEmpty = false, $exceptions = true);

    /**
     * isValid
     * @param      $type
     * @param      $data
     * @param bool $mayBeNull
     * @param bool $mayBeEmpty
     * @param bool $exceptions
     * @return mixed
     */
    public function isValid($type, $data, $mayBeNull = false, $mayBeEmpty = false, $exceptions = true);
}