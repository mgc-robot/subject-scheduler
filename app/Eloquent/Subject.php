<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = ['edp_code', 'name', 'description', 'type', 'unit'];
    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedules(){
        return $this->hasMany('App\Eloquent\Schedule');
    }
}
