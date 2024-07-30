<?php

namespace App\Models;

use App\Rules\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','parent_id','description','image','status','slug'
    ];
// unique:categories,name,$id
//  this mean it will check all rows unless itself 
    public static function rules($id = 0){
        return [
        // 'name'=>"required|String|min:3|max:255|unique:categories,name,$id",
        'name'=>[
            'required',
            'String','min:3',
            'max:255',
            'filter:laravel,php,oho',
            // 'unique:categories,name,$id'
            Rule::unique('categories','name')->ignore($id),
            // function($attribute,$value,$fails){
            //     if (strtolower($value) == 'laravel') {
            //      $fails('this name is forbidden');                }
            // }
            // new Filter(['laravel','php'])
        ],
        'parent_id'=>[
            'nullable','int','exists:categories,id'
        ],
        'image'=>[
            'image','max:1048576','dimensions:min_width=100,min_height=100'
        ],
        'status'=> 'in:active,archived'
    ];
    }
}