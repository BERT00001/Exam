<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBook extends Model
{
    use HasFactory;

    protected $table = 'adminbook';
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Title',
        'Author',
        'Copies',
        'Borrowed',
    ];

    protected static function boot()
    {
        
        parent::boot();

        /** Admin | Book Model **/
        static::updating(function ($book)
        {
            $oldBorrowed = $book->getOriginal('Borrowed');
            $newBorrowed = $book->Borrowed;
            $borrowChange = $newBorrowed - $oldBorrowed;

        if ($book->Copies - $borrowChange < 0) 
        {
            $book->Copies = 0;
        } else {
            $book->Copies -= $borrowChange;
        }

        });
    }
}