<?php

namespace DataLibrary\Validator\Interfaces;

/**
 * Interface ValidatorInterface
 * @package DataLibrary\Validator
 * @author James Johnson james.johnson@excellentingenuity.com
 * @license MIT
 * @copyright 2015 by ExcellentInGenuity LLC
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