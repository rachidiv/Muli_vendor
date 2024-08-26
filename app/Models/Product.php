<?php

namespace App\Models;

use App\Models\Scopes\StoreScope;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug','description','image','category_id','store_id','price','compare_price','status'
    ];
    protected $hidden = [
        'created_at','update_at','delete_at','image'
    ];
        // the $hidden proporties will not display in json api;

    protected $appends = [
        'image_url'
    ];
    // this is the accessors properties 
    public function getRouteKeyName()
{
    return 'slug';
}
    // we use closer function 
    // protected static function booted(){
    //     static::addGlobalScope('store',function(Builder $builder){
    //         $user=Auth::user();
    //         if($user->store_id){
    //             $builder->where('store_id' , '=', $user->store_id);

    //         }
    //     });
    // }
        // we give our globalScope the name store 

    protected static function booted(){
        static::addGlobalScope('store',new StoreScope());
        static::creating(function(Product $product){
            $product->slug = Str::slug($product->name);
        });
    }
    public function category(){
        return $this->belongsTo(category::class,'category_id','id');
    }
    public function store(){
        return $this->belongsTo(Store::class,'store_id','id');
    }
    public function tags(){
        return $this->belongsToMany(
            Tag::class, //related model
            'product_tag', //pivot table name
            'product_id', //fk in pivot table for the current model
            'tag_id', //fk in pivot table for the releted model
            'id', //pk for current model 
            'id'  //pk for related model

        );
    }

    public function scopeActive(Builder $builder){
            $builder->where('status' ,'=',"active");
        }
       //accessors for image property
    public function getImageUrlAttribute(){
        if(!$this->image){
            return 'data:image/jpeg;base64,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';
        }
        if(Str::startsWith($this->image,['http://','https://'])){
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }   
    public function getSalePercentAttribute(){
        if(!$this->compare_price){
            return 0;
        }
        return number_format(100 - (100 * $this->price / $this->compare_price),1);
    }
    public function scopeFilter(Builder $builder, $filters)
    {
        $options = array_merge([
            'store_id' => null,
            'category_id' => null,
            'tag_id' => null,
            'status' => 'active',
        ], $filters);

        $builder->when($options['status'], function ($query, $status) {
            return $query->where('status', $status);
        });

        $builder->when($options['store_id'], function($builder, $value) {
            $builder->where('store_id', $value);
        });
        $builder->when($options['category_id'], function($builder, $value) {
            $builder->where('category_id', $value);
        });
        $builder->when($options['tag_id'], function($builder, $value) {

            $builder->whereExists(function($query) use ($value) {
                $query->select(1)
                    ->from('product_tag')
                    ->whereRaw('product_id = products.id')
                    ->where('tag_id', $value);
            });
            // $builder->whereRaw('id IN (SELECT product_id FROM product_tag WHERE tag_id = ?)', [$value]);
            // $builder->whereRaw('EXISTS (SELECT 1 FROM product_tag WHERE tag_id = ? AND product_id = products.id)', [$value]);
            
            // $builder->whereHas('tags', function($builder) use ($value) {
            //     $builder->where('id', $value);
            // });
        });
    }


}