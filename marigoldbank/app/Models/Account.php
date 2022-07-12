<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'accountNumber',
        'password',
        'address',
        'phone',
        'cash',
    ];
      /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    public function iban() {
        $iban = 'LT' . '10100' . rand(12345678901, 92345678901);
        return $iban;
    }
}
