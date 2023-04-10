<?php

namespace App\Http\Controllers;

use App\Services\admin\ColorService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @package App\Http\Controllers
 * Class ColorController
 */
class ColorController extends Controller
{
    private ColorService $colorService;

    /**
     * @param ColorService $colorService
     */
    public function __construct(ColorService $colorService)
    {
        $this->colorService = $colorService;
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $colors = $this->colorService->getColors();

        return view('admin.color.list',compact('colors'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request): JsonResponse
    {
        return $this->colorService->saveOrUpdate($request->all());
    }
}
