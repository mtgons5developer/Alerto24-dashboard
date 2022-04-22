<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateServiceCategoryAPIRequest;
use App\Http\Requests\API\UpdateServiceCategoryAPIRequest;
use App\Models\ServiceCategory;
use App\Repositories\ServiceCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ServiceCategoryController
 * @package App\Http\Controllers\API
 */

class ServiceCategoryAPIController extends AppBaseController
{
    /** @var  ServiceCategoryRepository */
    private $serviceCategoryRepository;

    public function __construct(ServiceCategoryRepository $serviceCategoryRepo)
    {
        $this->serviceCategoryRepository = $serviceCategoryRepo;
    }

    /**
     * Display a listing of the ServiceCategory.
     * GET|HEAD /serviceCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $serviceCategories = $this->serviceCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($serviceCategories->toArray(), 'Service Categories retrieved successfully');
    }

    /**
     * Store a newly created ServiceCategory in storage.
     * POST /serviceCategories
     *
     * @param CreateServiceCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceCategoryAPIRequest $request)
    {
        $input = $request->all();

        $serviceCategory = $this->serviceCategoryRepository->create($input);

        return $this->sendResponse($serviceCategory->toArray(), 'Service Category saved successfully');
    }

    /**
     * Display the specified ServiceCategory.
     * GET|HEAD /serviceCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ServiceCategory $serviceCategory */
        $serviceCategory = $this->serviceCategoryRepository->find($id);

        if (empty($serviceCategory)) {
            return $this->sendError('Service Category not found');
        }

        return $this->sendResponse($serviceCategory->toArray(), 'Service Category retrieved successfully');
    }

    /**
     * Update the specified ServiceCategory in storage.
     * PUT/PATCH /serviceCategories/{id}
     *
     * @param int $id
     * @param UpdateServiceCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ServiceCategory $serviceCategory */
        $serviceCategory = $this->serviceCategoryRepository->find($id);

        if (empty($serviceCategory)) {
            return $this->sendError('Service Category not found');
        }

        $serviceCategory = $this->serviceCategoryRepository->update($input, $id);

        return $this->sendResponse($serviceCategory->toArray(), 'ServiceCategory updated successfully');
    }

    /**
     * Remove the specified ServiceCategory from storage.
     * DELETE /serviceCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ServiceCategory $serviceCategory */
        $serviceCategory = $this->serviceCategoryRepository->find($id);

        if (empty($serviceCategory)) {
            return $this->sendError('Service Category not found');
        }

        $serviceCategory->delete();

        return $this->sendSuccess('Service Category deleted successfully');
    }
}
