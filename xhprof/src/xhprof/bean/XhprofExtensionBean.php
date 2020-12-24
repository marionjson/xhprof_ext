<?php

namespace xhprof\bean;

class XhprofExtensionBean
{

    /***
     * @var string 扩展名
     */
    private $extension;

    /***
     * @var string 分析对象
     */
    public $flagsCpu = "_FLAGS_CPU";

    /***
     * @var string 分析对象
     */
    public $flagsMemory = "_FLAGS_MEMORY";

    /***
     * @var string 分析对象
     */
    public $envVarName = "_PROFILE";

    /**
     * XhprofExtensionBean constructor.
     * @param string $extension
     */
    public function __construct(string $extension)
    {
        $this->extension = $extension;
        $this->flagsCpu = constant(strtoupper($this->extension) . $this->flagsCpu);
        $this->flagsMemory = constant(strtoupper($this->extension) . $this->flagsMemory);
        $this->envVarName = $this->extension . $this->envVarName;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @return string
     */
    public function getFlagsCpu(): int
    {
        return $this->flagsCpu;
    }

    /**
     * @return string
     */
    public function getFlagsMemory(): int
    {
        return $this->flagsMemory;
    }

    /**
     * @return string
     */
    public function getEnvVarName(): string
    {
        return $this->envVarName;
    }




}