<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    public function voucher()
    {
        return $this->hasOne(Voucher::class)->withDefault();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
