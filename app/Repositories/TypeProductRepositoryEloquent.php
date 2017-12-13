<?php

namespace Taller\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Taller\Repositories\TypeProductRepository;
use Taller\Entities\TypeProduct;
use Taller\Validators\TypeProductValidator;

/**
 * Class TypeProductRepositoryEloquent
 * @package namespace Taller\Repositories;
 */
class TypeProductRepositoryEloquent extends BaseRepository implements TypeProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TypeProduct::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TypeProductValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
