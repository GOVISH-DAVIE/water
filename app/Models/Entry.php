<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstEntry',
        'firstEntryimg',
        'secEntry',
        'sectEntryimg',
        'total',
        'cpu',
        'received',
        'expected',
    ];
}
