<?php

namespace App\Transformers;

use App\Item;
use App\ShipOrder;
use League\Fractal\TransformerAbstract;

class ShipOrderTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'items'
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
     * @param ShipOrder $shipOrder
     * @return array
     */
    public function transform(ShipOrder $shipOrder)
    {
        return [
            'id'      => (int) $shipOrder->id,
            'shipto_name'   => $shipOrder->shipto_name,
            'shipto_address'   => $shipOrder->shipto_address,
            'shipto_city'   => $shipOrder->shipto_city,
            'shipto_country'   => $shipOrder->shipto_country
        ];
    }

    public function includeItems(ShipOrder $shipOrder)
    {
        return $this->collection($shipOrder->items()->get(), new ItemTransformer());
    }
}
