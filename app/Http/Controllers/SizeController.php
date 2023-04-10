<?php

namespace App\Http\Controllers;

use App\Services\admin\SizeService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @package App\Http\Controllers
 * Class SizeController
 */
class SizeController extends Controller
{
    private SizeService $sizeService;

    /**
     * @param SizeService $sizeService
     */
    public function __construct(SizeService $sizeService)
    {
        $this->sizeService = $sizeService;
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $sizes = $this->sizeService->getSize();

        return view('admin.size.list',compact('sizes'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request): JsonResponse
    {
        return $this->sizeService->saveOrUpdate($request->all());
    }
}
