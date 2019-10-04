<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ProductValidator.
 *
 * @package namespace App\Validators;
 */
class ProductValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'instituition_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'indexer' => 'required',
            'intereset_rate' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'instituition_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'indexer' => 'required',
            'intereset_rate' => 'required',
        ],
    ];
}
