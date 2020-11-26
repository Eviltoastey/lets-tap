<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/**
 * Class SignedEmailVerificationRequest
 *
 * A request that authorizes the user based on the route signature.
 *
 * @package App\Http\Requests
 */
class EmailVerification extends EmailVerificationRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = User::find($this->route()->parameters()["id"]);

        if (!hash_equals((string) $this->route()->parameters()["hash"], sha1($user->getEmailForVerification()))) {
            return false;
        }

        if($user->email_verified_at) {
            return false;
        }

        return true;
    }
}