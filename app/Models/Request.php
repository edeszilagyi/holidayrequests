<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Request extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'start_date', 'end_date', 'status', 'comment'];

    public function scopefilter($query, array $filters) {
        if($filters['status'] ?? false){
            $query->where('status', 'like', '%' . request('status') . '%');
        }

        if($filters['search'] ?? false){
            $query->where('status', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship to user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
