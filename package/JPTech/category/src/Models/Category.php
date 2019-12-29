<?php
namespace JPTech\Category\Models;

//use JPTech\BaseAttributeModel as Model;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //use SoftDeletes;

    protected $table = 'jpa_category';
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    protected $fillable = [
        'id',
        'category_name',
        'name_ascii',
        'image',
        'description',
        'position',
        'module',
        'parent_id',
        'is_show',
        'slug_id',
        'create_user',
        'update_user',
        'create_date',
        'update_date',
        'deleted_at',
    ];

    public function slug()
    {
        return $this->belongsTo('JPTech\Slug\Models\Slug','id');
    }

    public function content()
    {
        return $this->belongsTo('JPTech\Content\Models\Content','id');
    }
}
