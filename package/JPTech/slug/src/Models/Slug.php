<?php
namespace JPTech\Slug\Models;

//use JPTech\BaseAttributeModel as Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent;

class Slug extends Model
{
    use SoftDeletes;
    protected $table = 'jpa_slug';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'id_entity',
        'module',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'social_title',
        'social_description',
        'social_ogImage',
        'type',
        'create_user',
        'update_user',
        'create_date',
        'update_date',
        'deleted_at'
    ];

    public function category()
    {
        return $this->hasMany('JPTech\Category\Models\Category','id','id_entity' ,'module');
    }
}
