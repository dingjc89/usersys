<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Libraries\Xml\Base;

class UpdatePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permision:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '更新权限';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $base = new Base();
        foreach ($base as $item) {
            foreach ($base->current as $value) {
                $result = $base->active($value);
                if (is_array($result)) {
                    // 更新全新
                    $this->info($result['table'].'模块'.$result['action'].'权限'.$result['name'].'成功');
                }
            }
        }
        $this->info('更新完成');
    }
}
