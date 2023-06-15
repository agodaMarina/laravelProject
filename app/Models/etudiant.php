<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class etudiant
 * @package App\Models
 * @version June 12, 2023, 2:37 pm UTC
 *
 * @property \App\Models\Filiere $filiere
 * @property string $nom
 * @property string $prenom
 * @property integer $age
 * @property string $contact
 * @property integer $filiere
 */
class etudiant extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'etudiant';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'prenom',
        'age',
        'contact',
        'filiere'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'prenom' => 'string',
        'age' => 'integer',
        'contact' => 'string',
        'filiere' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'nullable|string|max:45',
        'prenom' => 'nullable|string|max:100',
        'age' => 'nullable|integer',
        'contact' => 'nullable|string|max:55',
        'created_at' => 'nullable',
        'deleted_at' => 'nullable',
        'updated_at' => 'nullable',
        'filiere' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function filiere()
    {
        return $this->belongsTo(\App\Models\filiere::class, 'filiere');
    }
}
