<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    protected $primaryKey = "ISBN";
    public $incrementing = false;
    protected $fillable = ['ISBN' , 'title' , 'price' , 'mortgage' ,'authorship_date' ,'category_id'];

}
