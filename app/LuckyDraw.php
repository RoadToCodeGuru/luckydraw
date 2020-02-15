<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuckyDraw extends Model
{
    protected $fillable = ['number', 'name', 'special_number', 'type_id', 'staff_id', 'picture'];

    public function staff(){
        return $this->belongsTo(Staff::class);
    }

    public function winnerIs(Staff $staff){
        $this->staff_id = $staff->id;
        return $this->save();
    }
}
