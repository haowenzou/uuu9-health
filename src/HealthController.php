<?php

namespace Uuu9\Health;

use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class HealthController extends BaseController
{
    public function check(Check $check)
    {
        try {
            $check->run();
            return response()->json(['Peter' => 'Mr. Stark, I feel so good'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['Peter' => 'Mr. Stark, I don\'t feel so good'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
