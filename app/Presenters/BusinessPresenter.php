<?php

namespace Taller\Presenters;

use Taller\Transformers\BusinessTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BusinessPresenter
 *
 * @package namespace Taller\Presenters;
 */
class BusinessPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BusinessTransformer();
    }
}
