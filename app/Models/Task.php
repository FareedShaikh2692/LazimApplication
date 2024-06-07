<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        // Add other fillable fields as needed
    ];

    // Example relationship: a Task belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
