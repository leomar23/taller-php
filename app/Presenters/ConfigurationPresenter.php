<?php

namespace Taller\Presenters;

use Taller\Transformers\ConfigurationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ConfigurationPresenter
 *
 * @package namespace Taller\Presenters;
 */
class ConfigurationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ConfigurationTransformer();
    }
}
