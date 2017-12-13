<?php

namespace Taller\Presenters;

use Taller\Transformers\TypeProductTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TypeProductPresenter
 *
 * @package namespace Taller\Presenters;
 */
class TypeProductPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TypeProductTransformer();
    }
}
