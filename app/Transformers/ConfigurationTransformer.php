<?php

namespace Taller\Transformers;

use League\Fractal\TransformerAbstract;
use Taller\Entities\Configuration;

/**
 * Class ConfigurationTransformer
 * @package namespace Taller\Transformers;
 */
class ConfigurationTransformer extends TransformerAbstract
{

    /**
     * Transform the \Configuration entity
     * @param \Configuration $model
     *
     * @return array
     */
    public function transform(Configuration $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
