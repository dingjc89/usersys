<?php
/**
 *
 */
namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('permission', function($expression){
           return "<?php if((new \App\Repositories\PermissionRepository)->isPermission{$expression}): ?>";
        });
        Blade::directive('endpermission',function(){
            return '<?php endif; ?>';
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
