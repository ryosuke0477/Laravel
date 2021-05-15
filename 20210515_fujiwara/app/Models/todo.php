<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    use HasFactory;
    public static $rules = array(
        'content' => 'required|max:20',
    );

    protected $fillable = ['content'];
}
