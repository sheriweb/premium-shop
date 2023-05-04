<?php

namespace App\Helper;

class HelperFunction
{
   public static function getPriceRange($price): array
   {
        if(str_contains($price,'+')){
          $tempPrice =   explode('+',$price);
          return [
            'range_type' => 'single',
            'max_price' =>   $tempPrice[0]
          ];
        }else{
            $tempPrice =   explode('-',$price);
            return[
                'range_type' => 'between',
                'min_price' =>   $tempPrice[0],
                'max_price' =>   $tempPrice[1]
            ];
        }
   }
}
