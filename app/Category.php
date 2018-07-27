<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public $table = "categories";

    // Şu an database ile ilgili bir sorun yaşıyoruz. Database'i başarılı bir şekilde kurduktan sonra,
    // cascade silme işlemindeki hata ile ilgilenmemiz gerekiyor.
}
