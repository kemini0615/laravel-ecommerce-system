@extends('admin.layouts.app')

@section('content')
    <div class="container-xl mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Approved Requests</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date of birth</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kyc_requests as $kyc_request)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kyc_request->name }}</td>
                                    <td class="text-secondary">{{ $kyc_request->user->email }}</td>
                                    <td class="text-secondary">{{ $kyc_request->date_of_birth }}</td>
                                    <td class="text-secondary">{{ $kyc_request->gender }}</td>
                                    <td class="text-secondary"><span class="badge bg-success-lt">Approved</span></td>
                                    <td>
                                        <a href="{{ route('admin.kyc.verification.show', $kyc_request->id) }}">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No approved requests</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {{ $kyc_requests->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
