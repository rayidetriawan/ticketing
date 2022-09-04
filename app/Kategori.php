<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function subKategori(){
        return $this->hasOne('App\SubKategori');
    }
}
