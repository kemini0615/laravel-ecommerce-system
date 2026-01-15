@extends('admin.layouts.app')

@section('content')
    <div class="container-xl mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">KYC Request Details</h3>
                <div class="card-actions">
                    <a href="{{ url()->previous() }}" class="btn btn-primary btn-3">
                        Back
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td class="text-secondary">{{ $kyc_request->name }}</td>
                            </tr>
                            <tr>
                                <td>Date of birth</td>
                                <td class="text-secondary">{{ $kyc_request->date_of_birth }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td class="text-secondary">{{ $kyc_request->gender }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td class="text-secondary">{{ $kyc_request->address }}</td>
                            </tr>

                            <tr>
                                <td>Document Type</td>
                                <td class="text-secondary">{{ $kyc_request->document_type }}</td>
                            </tr>
                            <tr>
                                <td>Document</td>
                                <td><a href="{{ route('admin.kyc.verification.download', $kyc_request->id) }}"
                                        class="btn btn-6 btn-outline-dark">Download</a></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                @if ($kyc_request->status === 'pending')
                                    <td class="text-secondary"><span class="badge bg-warning-lt">Pending</span></td>
                                @elseif ($kyc_request->status === 'approved')
                                    <td class="text-secondary"><span class="badge bg-success-lt">Approved</span></td>
                                @elseif ($kyc_request->status === 'rejected')
                                    <td class="text-secondary"><span class="badge bg-danger-lt">Rejected</span></td>
                                @endif
                            </tr>
                            <tr>
                                <td>Change Status</td>
                                <td>
                                    <form action="{{ route('admin.kyc.verification.update', $kyc_request->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="input-group">
                                            <select name="status" class="form-control">
                                                <option value="pending">Pending</option>
                                                <option value="approved">Approved</option>
                                                <option value="rejected">Rejected</option>
                                            </select>
                                            <button type="submit" class="btn btn-6 btn-outline-dark">Update</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
