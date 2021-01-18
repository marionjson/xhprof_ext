<?php

namespace xhprof\bean;

class  ProcessDetailsBean
{

    /***
     * 调用次数
     * @var
     */
    public $ct;

    /***
     * 等待时间
     * @var
     */
    public $wt;

    /***
     * cpu时间
     * @var
     */
    public $cpu;

    /***
     * 内存使用
     * @var
     */
    public $mu;

    /***
     * 高峰内存使用
     * @var
     */
    public $pmu;

    /***
     * 数据源
     *  @var string
     */
    public $data;

    /**
     * ProcessDetailsBean constructor.
     * @param array $xhprof_data
     */
    public function __construct( array $xhprof_data)
    {
        $this->pmu = isset($xhprof_data['main()']['pmu']) ? $xhprof_data['main()']['pmu'] : 0;
        $this->wt  = isset($xhprof_data['main()']['wt'])  ? $xhprof_data['main()']['wt']  : 0;
        $this->cpu = isset($xhprof_data['main()']['cpu']) ? $xhprof_data['main()']['cpu'] : 0;
        $this->mu = isset($xhprof_data['main()']['mu']) ? $xhprof_data['main()']['mu'] : 0;
        $this->ct = isset($xhprof_data['main()']['ct']) ? $xhprof_data['main()']['ct'] : 0;
        $this->data = $xhprof_data;
    }

}