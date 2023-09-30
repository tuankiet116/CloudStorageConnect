<?php

namespace App\Services\User;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function getMyProfile(): ?User
    {
        $result = null;
        $userId = auth()->user()->id;
        try {
            $result = $this->getUserInformation(0);
        } catch (Exception $error) {
            if ($error instanceof ModelNotFoundException)
                Log::error("User not found with user ID: $userId");
        } finally {
            return $result;
        }
    }

    public function getUserInformation(int $userId)
    {
        return User::findOrFail($userId);
    }
}
