<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Company extends Authenticatable
{
    use HasFactory,SoftDeletes;

    protected $table = 'company';
    protected $guarded = array();

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
