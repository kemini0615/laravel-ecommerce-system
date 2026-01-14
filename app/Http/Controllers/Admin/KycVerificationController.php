<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KycVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KycVerificationController extends Controller
{
    public function index()
    {
        $requests = KycVerification::paginate(10);
        return view('admin.verification.index', ['requests' => $requests]);
    }

    // 타입 힌트를 사용할 때, 라우트 파라미터와 메소드의 파라미터 이름은 동일해야 한다.
    public function show(KycVerification $request)
    {
        return view('admin.verification.show', ['request' => $request]);
    }

    public function download(KycVerification $request)
    {
        return Storage::disk('local')->download($request->document);
    }
}
