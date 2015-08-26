<?php 

 namespace DataLibrary\Validator\Facades;

 use DataLibrary\Validator\Validator;


 /**
  * Class ValidatorFacade
  * @package DataLibrary\Validator\Facades
  */
 class ValidatorFacade {

     /**
      * validate
      * @param      $type
      * @param      $data
      * @param bool $mayBeNull
      * @param bool $mayBeEmpty
      * @param bool $exceptions
      * @return bool
      */
     public static function validate($type, $data, $mayBeNull = false, $mayBeEmpty = false, $exceptions = true)
    {
        $validator = new Validator();
        return $validator->validate($type, $data, $mayBeNull, $mayBeEmpty, $exceptions);
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
     public static function isValid($type, $data, $mayBeNull = false, $mayBeEmpty = false, $exceptions = true)
    {
        $validator = new Validator();
        return $validator->isValid($type, $data, $mayBeNull, $mayBeEmpty, $exceptions);
    }


}