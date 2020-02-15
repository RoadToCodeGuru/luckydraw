<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['name', 'store_dept', 'type_id', 'already-winner'];

    public function lucky_draw(){
        return $this->hasOne(LuckyDraw::class);
    }

    // public function won(){
    //     $this->already_winner = true;
    //     return $this->save();
    // }

    public function reset_winner(){
        $this->already_winner = false;
        $this->save();
    }
}
