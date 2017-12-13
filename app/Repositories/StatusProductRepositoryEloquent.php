<?php

namespace Taller\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Taller\Repositories\StatusProductRepository;
use Taller\Entities\StatusProduct;
use Taller\Validators\StatusProductValidator;

/**
 * Class StatusProductRepositoryEloquent
 * @package namespace Taller\Repositories;
 */
class StatusProductRepositoryEloquent extends BaseRepository implements StatusProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return StatusProduct::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return StatusProductValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
