<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KycVerification;
use App\Services\MailService;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KycVerificationController extends Controller
{
    public function index()
    {
        $kyc_requests = KycVerification::paginate(10);
        return view('admin.verification.index', ['kyc_requests' => $kyc_requests]);
    }

    // 타입 힌트를 사용할 때, 라우트 파라미터와 메소드의 파라미터 이름은 동일해야 한다.
    public function show(KycVerification $kyc_request)
    {
        return view('admin.verification.show', ['kyc_request' => $kyc_request]);
    }

    public function update(KycVerification $kyc_request, Request $request)
    {
        $kyc_request->update([
            'status' => $request->status
        ]);

        if ($kyc_request->status === 'approved') {
            $body = 'Congratulations! Your request has been approved successfully.';
        } else if ($kyc_request->status === 'rejected') {
            $body = 'Sorry. Your request has been rejected.';
        }

        MailService::send(
            to: $kyc_request->user->email,
            subject: 'KYC Verification Request Updated',
            body: $body
        );

        NotificationService::updated();

        return redirect()->route('admin.kyc.verification');
    }

    public function download(KycVerification $kyc_request)
    {
        return Storage::disk('local')->download($kyc_request->document);
    }

    public function pending()
    {
        $kyc_requests = KycVerification::where('status', 'pending')->paginate(10);
        return view('admin.verification.pending', ['kyc_requests' => $kyc_requests]);
    }

    public function approved()
    {
        $kyc_requests = KycVerification::where('status', 'approved')->paginate(10);
        return view('admin.verification.approved', ['kyc_requests' => $kyc_requests]);
    }

    public function rejected()
    {
        $kyc_requests = KycVerification::where('status', 'rejected')->paginate(10);
        return view('admin.verification.rejected', ['kyc_requests' => $kyc_requests]);
    }
}
