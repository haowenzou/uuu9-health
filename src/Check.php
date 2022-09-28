<?php

namespace Uuu9\Health;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class Check
{
    public function run()
    {
        $dbConn = config('database')['connections'];
        if ($dbConn) {
            foreach ($dbConn as $k => $v) {
                DB::connection($k)->select(DB::raw('select now() as '.$k));
            }
        }

        //选择一个 redis 连接做检查
        $redisConfig = config('database')['redis'];
        if ($redisConfig) {
            foreach ($redisConfig as $k => $v) {
                if (isset($v['host'], $v['port'], $v['database'])) {
                    Redis::connection($k)->PING('hello');
                }
            }
        }
    }
}
