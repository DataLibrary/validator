# DataLibrary/Validator

[![Coverage Status](https://coveralls.io/repos/DataLibrary/validator/badge.svg?branch=master)](https://coveralls.io/r/DataLibrary/validator?branch=master)
[![Build Status](https://travis-ci.org/DataLibrary/validator.svg?branch=master)](https://travis-ci.org/DataLibrary/validator)

A generic PHP Validator Service Object

Sponsored by [ExcellentInGenuity LLC](www.excellentingenuity.com) 

Install with either:

`
composer require data-library/validator
`

or in your composer.json file add under require:

`
    "data-library/validator": ">=2.1.*"
`

To use the static Facade use the Validator Facade (place before your class declaration)

`
use DataLibrary\ValidatorFacade as Validator;
`

Then you can use the Validator statically like so:

`
    Validator::validate($type = 'string', $data = 'this is a string');
`

or with the `isValid` method.

`
    Validator::isValid($type = 'string', $data = 'this is a string');
`


To use a concrete instance of Validator create a new instance of the Validator Object

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
`

`
    public function isValid($type, $data, $mayBeNull = false, $mayBeEmpty = false, $exceptions = true);
`

An Interface is provided in `DataLibrary\Validator\ValidatorInterface`.


Copyright 2015 by ExcellentInGenuity LLC contributed to DataLibrary