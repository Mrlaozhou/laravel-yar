<?php
namespace Mrlaozhou\Yar;

use Illuminate\Support\Facades\Route;
use Mrlaozhou\Yar\Middleware\RouteAsYarMiddleware;
use Mrlaozhou\Extend\ServiceProvider as ExtendServiceProvider;

class ServiceProvider extends ExtendServiceProvider
{
    /**
     * 路由命名空间路径
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';


    public function boot(){}

    /**
     * @throws \throwable
     */
    public function register()
    {
        //  检测是否安装Yaconf扩展
        $this->is_extension_loaded('yar');
        //  注册路由组
        $this->registerRouteGroup();
    }

    /**
     * 注册兼容Route的Yar Service路由组
     */
    protected function registerRouteGroup()
    {
        $this->app['router']->prefix('yar')->middleware(
            [ RouteAsYarMiddleware::class ]
        )->namespace($this->namespace)
         ->group(base_path( 'routes/yar.php' ));
    }
}