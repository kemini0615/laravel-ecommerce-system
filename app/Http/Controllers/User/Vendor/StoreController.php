<?php

namespace App\Http\Controllers\User\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Services\NotificationService;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $store = auth('web')->user()?->store;
        return view('user.vendor.store.index', ['store' => $store]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => ['nullable', 'image', 'max:2048'],
            'banner' => ['nullable', 'image', 'max:2048'],
            'name' => ['required', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:100'],
            'short_description' => ['required', 'string', 'max:255'],
            'long_description' => ['nullable', 'string', 'max:2000'],
        ]);

        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ];

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->uploadFile($request->file('logo'), auth('web')->user()?->store->logo);
        }

        if ($request->hasFile('banner')) {
            $data['banner'] = $this->uploadFile($request->file('banner'), auth('web')->user()?->store->banner);
        }

        // 첫 번째 인자(배열)의 조건을 만족하는 데이터(행)가 있다면, 해당 데이터의 값을 두 번째 인자(배열)의 값으로 수정(Update)한다.
        // 첫 번째 인자의 조건을 만족하는 데이터가 없다면, 첫 번째 인자와 두 번째 인자를 합친 새로운 데이터(행)를 생성(Create)한다.
        Store::updateOrCreate(
            ['user_id' => auth('web')->user()->id],
            $data
        );

        NotificationService::updated();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
