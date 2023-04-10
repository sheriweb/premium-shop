<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaveRequest;
use App\Services\admin\StoreService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class StoreController
 * @package App\Http\Controllers\admin
 */
class StoreController extends Controller
{
    private StoreService $storeService;

    /**
     * @param StoreService $storeService
     */
    public function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $stores = $this->storeService->getStores();

        return view('admin.store.list',compact('stores'));
    }

    /**
     * @param StoreSaveRequest $request
     * @return JsonResponse|void
     */
    public function save(StoreSaveRequest $request)
    {
        if ($request->store_id) {
            $response = $this->storeService->storeUpdate($request);

            if ($response) {
                return response()->json([
                    'status'  => 200,
                    'message' => 'Store Updated Successfully'
                ]);
            }
        } else {
            $response = $this->storeService->storeSave($request);

            if ($response) {
                return response()->json([
                    'status'  => 200,
                    'message' => 'Store Saved Successfully'
                ]);
            }
        }
    }
}
