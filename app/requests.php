<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requests extends Model
{
    //
    protected $fillable=['requisition_id','QTY','orderID','from','to','airtime','amount'];

    public function agents()
    {
        return $this->belongsTo(agents::class, 'requisition_id');
    }
}
