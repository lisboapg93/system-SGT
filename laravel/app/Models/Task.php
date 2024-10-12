<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Definindo os campos que podem ser atribuídos em massa
    protected $fillable = [
        'user_id', 
        'title', 
        'description', 
        'due_date', 
        'is_completed'
    ];

    // Definindo a relação com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
