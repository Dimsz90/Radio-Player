<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\book;
use App\Models\user;




class Pengembalian extends Model
{
    protected $table = 'pengembalians';
    protected $guarded = [ ];  // yang tidak boleh diisi manual


    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
