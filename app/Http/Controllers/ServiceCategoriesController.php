<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Exception;

class ServiceCategoriesController extends Controller
{

    /**
     * Display a listing of the service categories.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $serviceCategories = ServiceCategory::paginate(25);

        return view('service_categories.index', compact('serviceCategories'));
    }

    /**
     * Show the form for creating a new service category.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        

        return view('service_categories.create');
    }

    /**
     * Store a new service category in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            ServiceCategory::create($data);

            return redirect()->route('service_categories.service_category.index')
                ->with('success_message', 'Service Category was successfully added.');

    }

    /**
     * Display the specified service category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $serviceCategory = ServiceCategory::findOrFail($id);

        return view('service_categories.show', compact('serviceCategory'));
    }

    /**
     * Show the form for editing the specified service category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $serviceCategory = ServiceCategory::findOrFail($id);
        

        return view('service_categories.edit', compact('serviceCategory'));
    }

    /**
     * Update the specified service category in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $serviceCategory = ServiceCategory::findOrFail($id);
            $serviceCategory->update($data);

            return redirect()->route('service_categories.service_category.index')
                ->with('success_message', 'Service Category was successfully updated.');

    }

    /**
     * Remove the specified service category from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $serviceCategory = ServiceCategory::findOrFail($id);
            $serviceCategory->delete();

            return redirect()->route('service_categories.service_category.index')
                ->with('success_message', 'Service Category was successfully deleted.');
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
                'name' => 'required|nullable|string|min:1|max:255',
            'is_active' => 'boolean|nullable',
            'description' => 'string|min:1|max:1000|nullable', 
        ];
        
        $data = $request->validate($rules);

        $data['is_active'] = $request->has('is_active');

        return $data;
    }

}
