<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCards extends Model
{
    use HasFactory;
    protected $fillable = ['customer_email','card_id','bin_number'];
}
