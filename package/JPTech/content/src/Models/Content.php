<?php
namespace JPTech\Content\Models;

//use JPTech\BaseAttributeModel as Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent;

class Content extends Model
{
    use SoftDeletes;
    protected $table = 'jpa_content';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;
    
    protected $fillable = [
        'id',
        'content',
        'content_type',
        'id_entity',
        'module',
        'create_user',
        'create_date',
        'update_user',
        'update_date',
        'deleted_at'
    ];

    public function category()
    {
        return $this->hasMany('JPTech\Category\Models\Category','id','id_entity','module');
    }
}
