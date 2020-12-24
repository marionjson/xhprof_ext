<?php

namespace xhprof\filter;


interface FilteIterfacer
{

    public function beforeFilter(...$params);

    public function afterFilter(...$params);

}