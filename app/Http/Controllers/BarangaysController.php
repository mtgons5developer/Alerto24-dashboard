<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barangay;
use App\Models\City;
use Illuminate\Http\Request;
use Exception;

class BarangaysController extends Controller
{

    /**
     * Display a listing of the barangays.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $q = $request->q;
        $barangays = Barangay::query()
            ->when($q != null, function ($query) use ($q) {
                return $query->where('name', 'like', '%' . $q . '%');
            })->when($q != null, function ($query) use ($q) {
                return $query->orWhere('code', 'like', '%' . $q . '%');
            })->when($q != null, function ($query) use ($q) {
                return $query->orWhere('province_code', 'like', '%' . $q . '%');
            })->when($q != null, function ($query) use ($q) {
                return $query->orWhere('city_code', 'like', '%' . $q . '%');
            })->when($q != null, function ($query) use ($q) {
                return $query->orWhere('region_code', 'like', '%' . $q . '%');
            })
            ->latest()
            ->paginate(25);

        return view('barangays.index', compact('barangays'));
    }

    /**
     * Show the form for creating a new barangay.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('barangays.create');
    }

    /**
     * Store a new barangay in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


        $data = $this->getData($request);

        Barangay::create($data);

        return redirect()->route('barangays.barangay.index')
            ->with('success_message', 'Barangay was successfully added.');

    }

    /**
     * Display the specified barangay.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $barangay = Barangay::findOrFail($id);

        return view('barangays.show', compact('barangay'));
    }

    /**
     * Show the form for editing the specified barangay.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $barangay = Barangay::findOrFail($id);


        return view('barangays.edit', compact('barangay'));
    }

    /**
     * Update the specified barangay in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


        $data = $this->getData($request);

        $barangay = Barangay::findOrFail($id);
        $barangay->update($data);

        return redirect()->route('barangays.barangay.index')
            ->with('success_message', 'Barangay was successfully updated.');

    }

    /**
     * Remove the specified barangay from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $barangay = Barangay::findOrFail($id);
            $barangay->delete();

            return redirect()->route('barangays.barangay.index')
                ->with('success_message', 'Barangay was successfully deleted.');
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
            'name' => 'string|min:1|max:255|nullable',
            'code' => 'string|min:1|nullable',
            'city_code' => 'string|min:1|nullable',
            'province_code' => 'string|min:1|nullable',
            'region_code' => 'string|min:1|nullable',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
