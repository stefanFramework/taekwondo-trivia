<?php


namespace App\Domain\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    const ADMIN_PROFILE = 'admin';
    const USER_PROFILE = 'user';

    protected $table = 'users';

    protected $dates = ['deleted_at'];

    public function isAdmin()
    {
        return $this->profile == self::ADMIN_PROFILE;
    }

    public function isActive() {
        return $this->is_active;
    }

}