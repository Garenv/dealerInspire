<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;
    public $table = 'contacts';

    // By default laravel expects created_at & updated_at column in your table.
    // By making it to false it will override the default setting
    // This will get rid of the error that gets thrown upon form submission
    public $timestamps = false;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    /**
     * @var string[]
     */
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'message'
    ];
}
