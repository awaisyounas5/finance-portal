<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qna extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function financial_advisor()
    {
        return $this->belongsTo(User::class, 'user_id'); // Assuming user_id is the foreign key linking to FinancialAdvisor
    }
}
