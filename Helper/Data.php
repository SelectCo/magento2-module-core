<?php

namespace SelectCo\Core\Helper;

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

    public function __construct(Context $context, WriterInterface $configWriter)
    {
        parent::__construct($context);
        $this->configWriter = $configWriter;
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
}
