<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barangay;
use App\Models\City;
use App\Models\Province;
use App\Models\Region;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class UsersController extends Controller
{

    /**
     * Display a listing of the users.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $users = User::query()->latest()->paginate(25);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $provinces = Province::pluck('name', 'id')->all();
        $cities = City::pluck('name', 'id')->all();
        $barangays = Barangay::limit(100)->pluck('name', 'id');
//        dd($barangays);
        $regions = Region::pluck('name', 'id')->all();
        $serviceCategories = ServiceCategory::pluck('name', 'id')->all();

        return view('users.create', compact('provinces', 'cities', 'barangays', 'regions', 'serviceCategories'));
    }

    /**
     * Store a new user in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


        $data = $this->getData($request);

        $user = User::create($data);
        if ($request->password != null) {
            $user->password = \Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('users.user.index')
            ->with('success_message', 'User was successfully added.');

    }

    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::with('province', 'city', 'barangay', 'region', 'servicecategory')->findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $provinces = Province::pluck('name', 'id')->all();
        $cities = City::pluck('name', 'id')->all();
        $barangays = Barangay::pluck('name', 'id')->all();
        $regions = Region::pluck('name', 'id')->all();
        $serviceCategories = ServiceCategory::pluck('name', 'id')->all();

        return view('users.edit', compact('user', 'provinces', 'cities', 'barangays', 'regions', 'serviceCategories'));
    }

    /**
     * Update the specified user in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


        $data = $this->getData($request);

        $user = User::findOrFail($id);
        $user->update($data);
        if ($request->password != null) {
            $user->password = \Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('users.user.index')
            ->with('success_message', 'User was successfully updated.');

    }

    /**
     * Remove the specified user from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('users.user.index')
                ->with('success_message', 'User was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:1|max:255',
            'is_admin' => 'boolean|nullable',
            'email' => 'required|string|min:1|max:255',
            'email_verified_at' => 'nullable',
//            'password' => 'required',
            'user_type' => 'required|string|min:1|max:255',
            'street_address' => 'nullable',
            'province_id' => 'nullable',
            'city_id' => 'nullable',
            'barangay_id' => 'nullable',
            'region_id' => 'nullable',
            'contact_number' => 'nullable',
            'is_active' => 'boolean|nullable',
            'service_category_id' => 'nullable',
        ];

        $data = $request->validate($rules);

        $data['is_admin'] = $request->has('is_admin');
        $data['is_active'] = $request->has('is_active');

        return $data;
    }

}
