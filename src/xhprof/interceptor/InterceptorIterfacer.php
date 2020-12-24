<?php

namespace xhprof\Interceptor;


interface InterceptorIterfacer
{

    public function beforeInterceptor(...$params);

    public function afterInterceptor(...$params);

}