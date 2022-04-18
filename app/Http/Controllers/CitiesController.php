<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Exception;

class CitiesController extends Controller
{

    /**
     * Display a listing of the cities.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $q = $request->q;
        $cities = City::query()
            ->when($q != null, function ($query) use ($q) {
                return $query->where('name', 'like', '%' . $q . '%');
            })->when($q != null, function ($query) use ($q) {
                return $query->orWhere('code', 'like', '%' . $q . '%');
            })->when($q != null, function ($query) use ($q) {
                return $query->orWhere('province_code', 'like', '%' . $q . '%');
            })->when($q != null, function ($query) use ($q) {
                return $query->orWhere('psgc_code', 'like', '%' . $q . '%');
            })->when($q != null, function ($query) use ($q) {
                return $query->orWhere('region_desc', 'like', '%' . $q . '%');
            })
            ->latest()

            ->paginate(25);

        return view('cities.index', compact('cities', 'q'));
    }

    /**
     * Show the form for creating a new city.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('cities.create');
    }

    /**
     * Store a new city in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


        $data = $this->getData($request);

        City::create($data);

        return redirect()->route('cities.city.index')
            ->with('success_message', 'City was successfully added.');

    }

    /**
     * Display the specified city.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $city = City::findOrFail($id);

        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified city.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);


        return view('cities.edit', compact('city'));
    }

    /**
     * Update the specified city in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


        $data = $this->getData($request);

        $city = City::findOrFail($id);
        $city->update($data);

        return redirect()->route('cities.city.index')
            ->with('success_message', 'City was successfully updated.');

    }

    /**
     * Remove the specified city from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {

        $city = City::findOrFail($id);
        $city->delete();
//        dd($city);

        return redirect()->route('cities.city.index')
            ->with('success_message', 'City was successfully deleted.');

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
            'name' => 'required|nullable|string|min:1|max:255',
            'code' => 'string|min:1|nullable',
            'province_code' => 'string|min:1|nullable',
            'psgc_code' => 'string|min:1|nullable',
            'region_desc' => 'string|min:1|nullable',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
