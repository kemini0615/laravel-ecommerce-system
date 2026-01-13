<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\KycVerification;
use App\Services\NotificationService;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KycVerificationController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return view('user.customer.verification.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'max:255', 'string', 'in:male,female'],
            'address' => ['required', 'max:255', 'string'],
            'document_type' => ['required', 'max:255', 'string', 'in:passport,driver_license,id_card'],
            'document' => ['required', 'mimes:png,pdf,csv,docx', 'max:10240']
        ]);

        if (KycVerification::where('user_id', Auth::user()->id)->exists()) {
            $kyc = KycVerification::where('user_id', Auth::user()->id)->first();
        } else {
            $kyc = new KycVerification();
        }

        $kyc->user_id = Auth::user()->id;
        $kyc->status = 'pending';
        $kyc->name = $request->name;
        $kyc->date_of_birth = $request->date_of_birth;
        $kyc->gender = $request->gender;
        $kyc->address = $request->address;
        $kyc->document_type = $request->document_type;
        $kyc->document = $this->uploadPrivateFile($request->document);
        $kyc->save();

        NotificationService::created('Submitted Successfully.');

        return redirect()->route('vendor.dashboard');
    }
}
