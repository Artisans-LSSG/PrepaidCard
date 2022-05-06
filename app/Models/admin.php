<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class admin extends Model
{

    use HasFactory;
    /**
     * Here Admin will register using his name,e-mail,phone_number,address,dob,joining_date and password for the application and these Columns are store in Admin database, also these columns are calls in AdminController.
     *
     * @param admin $fillable
     * @return JsonResponse
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'address',
        'dob',
        'joined_date'
    ];
}
