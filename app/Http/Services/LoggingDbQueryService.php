<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class LoggingDbQueryService
{
   public static function loggingQuery()
   {
      DB::listen(function ($query) {
         File::append(
            storage_path('/logs/query.log'),
            '[' . date('Y-m-d H:i:s') . ']' . PHP_EOL . $query->sql . ' [' . implode(', ', $query->bindings) . ']' . PHP_EOL . PHP_EOL
         );
      });
   }
}
