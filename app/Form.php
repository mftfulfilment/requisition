<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public $with = ['requisitions'];
    //
    protected $fillable=['name','department','email','Country',
    'vendor_name','vendor_address','vendor_phone'];

    public function requisitions()
    {
        return $this->hasMany(Requisitions::class, 'req_id');
    }
}
