<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'book_id', 'status'];

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function scopeNotConfirmed($query)
    {
        return $query->where('confirmed', false);
    }

    public function scopeConfirmed($query)
    {
        return $query->where('confirmed', true);
    }

    public function isConfirmed()
    {
        return $this->confirmed;
    }
}
