<?php

namespace App\Transformers;

use App\Person;
use League\Fractal\TransformerAbstract;

class PersonTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'phones',
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'ship_orders',
    ];

    /**
     * A Fractal transformer.
     *
     * @param Person $person
     * @return array
     */
    public function transform(Person $person)
    {
        return [
            'id'      => (int) $person->id,
            'name'   => $person->name,
        ];
    }

    public function includePhones(Person $person)
    {
        return $this->collection($person->phones()->get(), new PhoneTransformer());
    }

    public function includeShipOrders(Person $person)
    {
        return $this->collection($person->shipOrders()->get(), new ShipOrderTransformer());
    }
}
