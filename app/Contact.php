<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $guarded = [];
  public function statuses () {
    return $this->hasMan(Status::class);
  }
}
