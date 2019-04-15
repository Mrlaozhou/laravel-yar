<?php
namespace Mrlaozhou\Yar\Middleware;

use Illuminate\Http\Request;
use Mrlaozhou\Yar\Server;

/**
 * Class RouteAsYarMiddleware
 *
 * 把传统路由注册未rpc[yar]路由
 *
 * @package Mrlaozhou\Yar\Middleware
 */
class RouteAsYarMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        //  启动YAR service 服务
        $this->bootYarService(
            $controller = $this->getControllerInstance($request)
        )->handle();
        //  GET 请求时返回文档
        if( $request->isMethod('GET') ) {
            return null;
        }
        return $next($request);
    }

    /**
     * @param $instance
     *
     * @return \Mrlaozhou\Yar\Server
     */
    protected function bootYarService($instance)
    {
        return new Server($instance);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \stdClass
     */
    protected function getControllerInstance(Request $request)
    {
        return $request->route()->getController();
    }
}