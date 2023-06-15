<?php

namespace App\Repositories;

use App\Models\Article--fromTable;
use App\Repositories\BaseRepository;

/**
 * Class Article--fromTableRepository
 * @package App\Repositories
 * @version May 6, 2023, 10:50 am UTC
*/

class Article--fromTableRepository extends BaseRepository
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
        return Article--fromTable::class;
    }
}
