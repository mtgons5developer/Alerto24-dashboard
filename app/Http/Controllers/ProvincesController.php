<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use Exception;

class ProvincesController extends Controller
{

    /**
     * Display a listing of the provinces.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $provinces = Province::paginate(25);

        return view('provinces.index', compact('provinces'));
    }

    /**
     * Show the form for creating a new province.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        

        return view('provinces.create');
    }

    /**
     * Store a new province in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            Province::create($data);

            return redirect()->route('provinces.province.index')
                ->with('success_message', 'Province was successfully added.');

    }

    /**
     * Display the specified province.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $province = Province::findOrFail($id);

        return view('provinces.show', compact('province'));
    }

    /**
     * Show the form for editing the specified province.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $province = Province::findOrFail($id);
        

        return view('provinces.edit', compact('province'));
    }

    /**
     * Update the specified province in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $province = Province::findOrFail($id);
            $province->update($data);

            return redirect()->route('provinces.province.index')
                ->with('success_message', 'Province was successfully updated.');

    }

    /**
     * Remove the specified province from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $province = Province::findOrFail($id);
            $province->delete();

            return redirect()->route('provinces.province.index')
                ->with('success_message', 'Province was successfully deleted.');
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
            'psgc_code' => 'string|min:1|nullable',
            'region_code' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
