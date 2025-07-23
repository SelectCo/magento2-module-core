<?php

namespace SelectCo\Core\Helper;

use Magento\Framework\App\Cache\TypeListInterface;
use Magento\Framework\App\Config\ReinitableConfigInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /**
     * @var WriterInterface
     */
    private $configWriter;
    /**
     * @var TypeListInterface
     */
    private $cacheTypeList;
    /**
     * @var ReinitableConfigInterface
     */
    private $reinitableConfig;

    public function __construct(Context $context, WriterInterface $configWriter, TypeListInterface $cacheTypeList, ReinitableConfigInterface $reinitableConfig)
    {
        parent::__construct($context);
        $this->configWriter = $configWriter;
        $this->cacheTypeList = $cacheTypeList;
        $this->reinitableConfig = $reinitableConfig;
    }

    /**
     * @param string $field
     * @param string $scope
     * @return mixed
     */
    public function getConfigValue(string $field, string $scope = ScopeInterface::SCOPE_STORE)
    {
        return $this->scopeConfig->getValue(
            $field,
            $scope
        );
    }

    /**
     * @param string $field
     * @param $value
     * @param string|null $scope
     * @param int $scopeId
     * @return void
     */
    public function setConfigValue(
        string      $field,
                    $value,
        ?string $scope = null,
        int         $scopeId = 0
    ): void {
        $scope = $scope ?? ScopeConfigInterface::SCOPE_TYPE_DEFAULT;
        $this->configWriter->save($field, $value, $scope, $scopeId);
    }

    /**
     * @param string $type
     * @return void
     */
    public function clearCache(string $type): void
    {
        $this->cacheTypeList->cleanType($type);
    }

    public function clearConfigCache()
    {
        $this->reinitableConfig->reinit();
    }
}
