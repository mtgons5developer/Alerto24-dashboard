<?php

namespace App\Repositories;

use App\Models\ServiceCategory;
use App\Repositories\BaseRepository;

/**
 * Class ServiceCategoryRepository
 * @package App\Repositories
 * @version April 20, 2022, 5:48 am UTC
*/

class ServiceCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ServiceCategory::class;
    }
}
