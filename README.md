# DataLibrary/Validator

[![Coverage Status](https://coveralls.io/repos/DataLibrary/validator/badge.svg?branch=master)](https://coveralls.io/r/DataLibrary/validator?branch=master)
[![Build Status](https://travis-ci.org/DataLibrary/validator.svg?branch=master)](https://travis-ci.org/DataLibrary/validator)

A generic PHP Validator Service Object

Install with either:
`
composer require data-library/validator
`
or in your composer.json file add under require:
`
    "data-library/validator": "dev-master"
`

To use, create a new instance of the Validator Object
` 
    $validator = new DataLibrary\Validator();
`

Call the `validate()` or `isValid()` methods passing in your expected type and data.

`
    $validator->isValid($type = 'string', $data = 'this is a string');
`

The full signature for the public functions are:

`
    public function validate($type, $data, $mayBeNull = false, $mayBeEmpty = false, $exceptions = true);
    public function isValid($type, $data, $mayBeNull = false, $mayBeEmpty = false, $exceptions = true);
`

An Interface is provided in `DataLibrary\Validator\ValidatorInterface`.
