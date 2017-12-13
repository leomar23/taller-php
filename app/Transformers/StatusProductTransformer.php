<?php

namespace Taller\Transformers;

use League\Fractal\TransformerAbstract;
use Taller\Entities\StatusProduct;

/**
 * Class StatusProductTransformer
 * @package namespace Taller\Transformers;
 */
class StatusProductTransformer extends TransformerAbstract
{

    /**
     * Transform the \StatusProduct entity
     * @param \StatusProduct $model
     *
     * @return array
     */
    public function transform(StatusProduct $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
