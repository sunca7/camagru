<?php
declare(strict_types=1);

namespace app\models;

use app\core\Model;

class RegisterModel extends Model
{
    public string $firstname;
    public string $lastname;
    public string $password;
    public string $confirmPassword;

    public function register()
    {

    }
}