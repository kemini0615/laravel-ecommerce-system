@extends('admin.layouts.app')

@section('content')
    <div class="container-xl mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Requests</h3>
                <div class="card-actions">
                    <a href="#" class="btn btn-primary btn-3">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-2">
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
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
                                <td class="text-secondary">{{ $request->name }}</td>
                            </tr>
                            <tr>
                                <td>Date of birth</td>
                                <td class="text-secondary">{{ $request->date_of_birth }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td class="text-secondary">{{ $request->gender }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td class="text-secondary">{{ $request->address }}</td>
                            </tr>

                            <tr>
                                <td>Document Type</td>
                                <td class="text-secondary">{{ $request->document_type }}</td>
                            </tr>
                            <tr>
                                <td>Document</td>
                                <td><a href="{{ route('admin.kyc.verification.download', $request->id) }}"
                                        class="btn btn-6 btn-outline-dark">Download</a></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                @if ($request->status === 'pending')
                                    <td class="text-secondary"><span class="badge bg-warning-lt">Pending</span></td>
                                @elseif ($request->status === 'approved')
                                    <td class="text-secondary"><span class="badge bg-success-lt">Approved</span></td>
                                @elseif ($request->status === 'rejected')
                                    <td class="text-secondary"><span class="badge bg-danger-lt">Rejected</span></td>
                                @endif
                            </tr>
                            <tr>
                                <td>Change Status</td>
                                <td>
                                    <form action="">
                                        <div class="input-group">
                                            <select name="new_status" class="form-control">
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
