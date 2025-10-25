<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Menu extends Model
{
    use HasFactory;
    
    protected $fillable=
     [
         'name',
            'price',
            'desc',
            'type',
            'photo',
    ];

public static $types=[
        'coffe',
        'non-coffe',
        'tea',
        'dessert',
];

     // ✅ Perbaikan Method getHargaAttribute
     public function getHargaAttribute()
     {
         return "Rp. " . number_format($this->price, 0, ',', ',');
     }

     public function getGambarAttribute()
     {
         return $this->photo ?  Storage::url($this->photo)  : url('no_image.jpg');
     }

}
