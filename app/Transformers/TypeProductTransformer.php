<?php

namespace Taller\Transformers;

use League\Fractal\TransformerAbstract;
use Taller\Entities\TypeProduct;

/**
 * Class TypeProductTransformer
 * @package namespace Taller\Transformers;
 */
class TypeProductTransformer extends TransformerAbstract
{

    /**
     * Transform the \TypeProduct entity
     * @param \TypeProduct $model
     *
     * @return array
     */
    public function transform(TypeProduct $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
