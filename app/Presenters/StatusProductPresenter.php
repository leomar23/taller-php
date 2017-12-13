<?php

namespace Taller\Presenters;

use Taller\Transformers\StatusProductTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StatusProductPresenter
 *
 * @package namespace Taller\Presenters;
 */
class StatusProductPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StatusProductTransformer();
    }
}
