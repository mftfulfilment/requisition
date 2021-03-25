<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agents extends Model
{
    //
    public $with = ['requests'];
    //
    protected $fillable=['requisitionNo','AgentName','region','AgentPhone',
    'RequisitionerName','RequisitionerEmail','RequisitionerPhone'];

    public function requests()
    {
        return $this->hasMany(requests::class, 'requisition_id');
    }
}
