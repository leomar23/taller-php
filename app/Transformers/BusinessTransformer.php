<?php

namespace Taller\Transformers;

use League\Fractal\TransformerAbstract;
use Taller\Entities\Business;

/**
 * Class BusinessTransformer
 * @package namespace Taller\Transformers;
 */
class BusinessTransformer extends TransformerAbstract
{

    /**
     * Transform the Business entity
     * @param Taller\Entities\Business $model
     *
     * @return array
     */
    public function transform(Business $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
