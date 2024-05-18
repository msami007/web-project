<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palette extends Model
{
    use HasFactory;
    protected $table = "palette";
    protected $primarykey = "id";
    protected $fillable = ['name', 'hex1', 'hex2', 'hex3', 'hex4', 'hex5','email'];
}
