<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckKycVerificationStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('web')->user();

        if ($user->kyc_verification->status === 'pending' || $user->kyc_verification->status === 'rejected' || $user->kyc_verification?->status === null) {
            return redirect()->route('vendor.dashboard');
        }

        if ($user->kyc_verification->status === 'approved') {
            return next($request);
        }

        return abort(403);
    }
}
