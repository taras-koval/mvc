<?php

namespace App\Models;

use App\Core\ModelAR;

class User extends ModelAR
{
    public ?int $id = null;
    public string $username = '';
    public string $email = '';
    public string $password = '';
    
    public static function getDBTableName(): string
    {
        return 'users';
    }
    
    public static function getDBFields(): array
    {
        return ['username', 'email', 'password'];
    }
    
    public function save()
    {
        $this->username = strtolower($this->username);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }
}