<?php

namespace App\DataTransferObjects\User;

class RegisterUserDto
{
    public function __construct(
        public string $email,
        public string $password
    )
    {
        
    }
}
