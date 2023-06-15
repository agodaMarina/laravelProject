<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Article
 * @package App\Models
 * @version May 27, 2023, 9:43 am UTC
 *
 * @property \App\Models\Categorie $categorie
 * @property string $libelle
 * @property integer $quantite
 * @property integer $prix_unitaire
 * @property integer $categorie
 */
class Article extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'article';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'libelle',
        'quantite',
        'prix_unitaire',
        'categorie'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'libelle' => 'string',
        'quantite' => 'integer',
        'prix_unitaire' => 'integer',
        'categorie' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle' => 'nullable|string|max:45',
        'quantite' => 'nullable|integer',
        'prix_unitaire' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'categorie' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categories()
    {
        return $this->belongsTo(\App\Models\Categorie::class, 'categorie');
    }
}
