<?php

namespace App\Services\admin;

use App\Models\Size;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

/**
 * @package App\Services\admin
 * Class SizeService
 */
class SizeService
{
    /**
     * @return Collection
     */
    public function getSize(): Collection
    {
        return Size::all();
    }

    /**
     * @param $request
     * @return JsonResponse
     */
    public function saveOrUpdate($request): JsonResponse
    {
        if (!$request['size_id']) {
            $size = new Size;
            $size = $this->commonField($request,$size);
            $size->save();

            return response()->json([
                'status'  => 200,
                'message' => 'Color Saved Successfully'
            ]);

        } else {
            $size = Size::find($request['size_id']);
            $size = $this->commonField($request, $size);
            $size->update();

            return response()->json([
                'status'  => 200,
                'message' => 'Color Updated Successfully'
            ]);
        }
    }

    /**
     * @param $request
     * @param $size
     * @return mixed
     */
    public function commonField($request,$size): mixed
    {
        $size->size      = $request['size'];
        $size->size_slug = Str::slug($request['size']);

        return $size;
    }
}
