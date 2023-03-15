<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
  use HasFactory;

  public function user()
  {
    $this->belongsTo(User::class);
  }

  public function todos()
  {
    $this->hasMany(Todo::class);
  }
}
