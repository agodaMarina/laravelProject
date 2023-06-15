<?php

namespace App\Repositories;

use App\Models\filiere;
use App\Repositories\BaseRepository;

/**
 * Class filiereRepository
 * @package App\Repositories
 * @version June 12, 2023, 2:35 pm UTC
*/

class filiereRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle'
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
        return filiere::class;
    }
}
