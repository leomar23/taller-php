<?php

namespace Taller\Presenters;

use Taller\Transformers\OrderDetailTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OrderDetailPresenter
 *
 * @package namespace Taller\Presenters;
 */
class OrderDetailPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OrderDetailTransformer();
    }
}
