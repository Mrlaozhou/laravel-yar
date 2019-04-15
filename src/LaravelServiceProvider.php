<?php
namespace Mrlaozhou\Yar;

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\ServiceProvider;
use Mrlaozhou\Yar\Exceptions\ExtensionNotLoadedException;
use Mrlaozhou\Yar\Middleware\RouteAsYarMiddleware;

class LaravelServiceProvider extends ServiceProvider
{
    /**
     * 路由命名空间路径
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    public function boot(){}

    /**
     * @throws \Mrlaozhou\Yar\Exceptions\ExtensionNotLoadedException
     */
    public function register()
    {
        //  检测是否安装Yaconf扩展
        if( ! extension_loaded('yar') ) {
            throw new ExtensionNotLoadedException('yar');
        }
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