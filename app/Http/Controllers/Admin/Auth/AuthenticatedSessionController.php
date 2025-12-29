<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * 로그인 페이지를 보여준다.
     */
    public function create(): View
    {
        return view('admin.auth.login');
    }

    /**
     * 로그인(인증) 요청을 처리한다.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 인증을 시도한다.
        $request->authenticate();

        // 세션 고정 공격을 막기 위해 세션을 재생성한다.
        $request->session()->regenerate();

        // 원래 가려고 했던 위치 또는 대시보드로 리다이렉트한다.
        return redirect()->intended(route('admin.dashboard', absolute: false));
    }

    /**
     * 인증 세션을 삭제한다.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
