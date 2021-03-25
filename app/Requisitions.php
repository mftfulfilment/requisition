<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisitions extends Model
{
    //
    protected $fillable=['req_id','Item','description','quantity','cost',
    'total'];

    public function form()
    {
        return $this->belongsTo(Form::class, 'req_id');
    }
}
