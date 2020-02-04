<?php

namespace App\Transformers;

use App\Item;
use League\Fractal\TransformerAbstract;

class ItemTransformer extends TransformerAbstract
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
     * @return array
     */
    public function transform(Item $item)
    {
        return [
            'id'      => (int) $item->id,
            'title'   => $item->title,
            'note'   => $item->note,
            'quantity'   => $item->quantity,
            'price'   => $item->price
        ];
    }
}
