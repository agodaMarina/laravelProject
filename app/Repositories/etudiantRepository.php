<?php

namespace App\Repositories;

use App\Models\etudiant;
use App\Repositories\BaseRepository;

/**
 * Class etudiantRepository
 * @package App\Repositories
 * @version June 12, 2023, 2:37 pm UTC
*/

class etudiantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'prenom',
        'age',
        'contact',
        'filiere'
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
        return etudiant::class;
    }
}
