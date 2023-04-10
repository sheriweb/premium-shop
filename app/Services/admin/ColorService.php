<?php

namespace App\Services\admin;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

/**
 * @package App\Services\admin
 * Class ColorService
 */
class ColorService
{
    /**
     * @return Collection
     */
    public function getColors(): Collection
    {
        return Color::all();
    }

    /**
     * @param $request
     * @return JsonResponse
     */
    public function saveOrUpdate($request): JsonResponse
    {
        if (!$request['color_id']) {
            $color = new Color;
            $color = $this->commonField($request,$color);
            $color->save();

            return response()->json([
                'status'  => 200,
                'message' => 'Color Saved Successfully'
            ]);

        } else {
            $color = Color::find($request['color_id']);
            $color = $this->commonField($request, $color);
            $color->update();

            return response()->json([
                'status'  => 200,
                'message' => 'Color Updated Successfully'
            ]);
        }
    }

    /**
     * @param $request
     * @param $color
     * @return mixed
     */
    public function commonField($request,$color): mixed
    {
        $color->color_name = $request['name'];
        $color->color_name_slug = Str::slug($request['name']);

        return $color;
    }
}
