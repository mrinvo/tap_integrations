<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAgreements extends Model
{
    use HasFactory;
    protected $fillable = ['customer_email', 'agreement_id', 'contract_id', 'status'];
}
