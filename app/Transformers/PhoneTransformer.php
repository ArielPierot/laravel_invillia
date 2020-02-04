<?php

namespace App\Transformers;

use App\Person;
use App\Phone;
use League\Fractal\TransformerAbstract;

class PhoneTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @param Phone $phone
     * @return array
     */
    public function transform(Phone $phone)
    {
        return [
            'id'      => (int) $phone->id,
            'number'   => (string) $phone->number
        ];
    }
}
