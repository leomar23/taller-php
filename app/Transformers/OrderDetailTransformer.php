<?php

namespace Taller\Transformers;

use League\Fractal\TransformerAbstract;
use Taller\Entities\OrderDetail;

/**
 * Class OrderDetailTransformer
 * @package namespace Taller\Transformers;
 */
class OrderDetailTransformer extends TransformerAbstract
{

    /**
     * Transform the \OrderDetail entity
     * @param \OrderDetail $model
     *
     * @return array
     */
    public function transform(OrderDetail $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
