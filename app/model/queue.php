<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class queue extends Model
{
    protected $table = 'jhay.opdqueue_queue';
    protected $primaryKey ='id';
    public $timestamps = false ;

    protected $fillable = [
        'newpat', 'oldpat','created_at'
    ];
}
