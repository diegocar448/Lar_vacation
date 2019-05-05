<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Plane extends Model
{
    protected $fillable = [
        'id', 'brand_id', 'qty_passengers', 'class', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    

    public function classes($className = null)
    {
        $classes = [            
            'economic' => 'Economica',
            'luxury' => 'Luxo',
        ];        
        

        if(!$className)
        {
            return $classes;
        }

        return $classes[$className];

    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function search($keySearch, $totalPage)
    {   

        return $this->where('id', $keySearch)
                    ->orWhere('qty_passengers', $keySearch)
                    ->orWhere('class', $keySearch)
                    ->paginate($totalPage);
    }


    
 


}
