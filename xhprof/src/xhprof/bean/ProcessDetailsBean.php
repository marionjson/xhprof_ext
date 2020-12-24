<?php

namespace xhprof\bean;

class  ProcessDetailsBean
{

    /***
     * 调用次数
     * @var
     */
    private $ct;

    /***
     * 等待时间
     * @var
     */
    private $wt;

    /***
     * cpu时间
     * @var
     */
    private $cpu;

    /***
     * 内存使用
     * @var
     */
    private $mu;

    /***
     * 高峰内存使用
     * @var
     */
    private $pmu;

    /***
     * 数据源
     *  @var string
     */
    private $data;

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
        $this->data = gzcompress(serialize($xhprof_data), 2);
    }

}