<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class filiere
 * @package App\Models
 * @version June 12, 2023, 2:35 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $etudiants
 * @property string $libelle
 */
class filiere extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'filiere';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'libelle'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'libelle' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle' => 'nullable|string|max:45',
        'created_at' => 'nullable',
        'deleted_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function etudiants()
    {
        return $this->hasMany(\App\Models\etudiant::class, 'filiere');
    }
}
