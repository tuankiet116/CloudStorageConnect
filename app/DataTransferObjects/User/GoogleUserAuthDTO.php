<?php

namespace App\DataTransferObjects\User;

class GoogleUserAuthDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $nickname,
        public readonly string $name,
        public readonly string $email,
        public readonly string $avatar,
        public readonly string $token
    ) {
    }

    public function setUser(array $userGoogle) {
        
    }
}
