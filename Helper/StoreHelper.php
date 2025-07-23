<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace SelectCo\Core\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use SelectCo\Core\Helper\Data as CoreHelperData;

class StoreHelper extends AbstractHelper
{
    const STORE_NAME = 'general/store_information/name';
    const STORE_PHONE_NUMBER = 'general/store_information/phone';
    const STORE_HOURS_OF_OPERATION = 'general/store_information/hours';
    const COUNTRY_ID = 'general/store_information/country_id';
    const REGION_STATE_ID = 'general/store_information/region_id';
    const ZIP_POSTAL_CODE = 'general/store_information/postcode';
    const CITY = 'general/store_information/city';
    const STREET_ADDRESS = 'general/store_information/street_line1';
    const STREET_ADDRESS_LINE_2 = 'general/store_information/street_line2';
    const VAT_NUMBER = 'general/store_information/merchant_vat_number';
    const GENERAL_SENDER_NAME = 'trans_email/ident_general/name';
    const GENERAL_SENDER_EMAIL = 'trans_email/ident_general/email';
    const SALES_SENDER_NAME = 'trans_email/ident_sales/name';
    const SALES_SENDER_EMAIL = 'trans_email/ident_sales/email';
    const SUPPORT_SENDER_NAME = 'trans_email/ident_support/name';
    const SUPPORT_SENDER_EMAIL = 'trans_email/ident_support/email';
    const CUSTOM1_SENDER_NAME = 'trans_email/ident_custom1/name';
    const CUSTOM1_SENDER_EMAIL = 'trans_email/ident_custom1/email';
    const CUSTOM2_SENDER_NAME = 'trans_email/ident_custom2/name';
    const CUSTOM2_SENDER_EMAIL = 'trans_email/ident_custom2/email';

    /**
     * @var CoreHelperData
     */
    private $coreHelper;

    /**
     * @param Context $context
     * @param CoreHelperData $coreHelper
     */
    public function __construct(Context $context, CoreHelperData $coreHelper)
    {
        parent::__construct($context);
        $this->coreHelper = $coreHelper;
    }

    /**
     * @param string $field
     * @return mixed
     */
    private function getConfigValue(string $field)
    {
        return $this->coreHelper->getConfigValue($field);
    }

    public function getStoreName(): ?string
    {
        return $this->getConfigValue(self::STORE_NAME);
    }

    public function getStorePhoneNumber(): ?string
    {
        return $this->getConfigValue(self::STORE_PHONE_NUMBER);
    }

    public function getStoreHoursOfOperation(): ?string
    {
        return $this->getConfigValue(self::STORE_HOURS_OF_OPERATION);
    }

    public function getCountryId(): ?string
    {
        return $this->getConfigValue(self::COUNTRY_ID);
    }

    public function getRegionStateId(): ?string
    {
        return $this->getConfigValue(self::REGION_STATE_ID);
    }

    public function getZipPostalCode(): ?string
    {
        return $this->getConfigValue(self::ZIP_POSTAL_CODE);
    }

    public function getCity(): ?string
    {
        return $this->getConfigValue(self::CITY);
    }

    public function getStreetAddress(): ?string
    {
        return $this->getConfigValue(self::STREET_ADDRESS);
    }

    public function getStreetAddressLine2(): ?string
    {
        return $this->getConfigValue(self::STREET_ADDRESS_LINE_2);
    }

    public function getVatNumber(): ?string
    {
        return $this->getConfigValue(self::VAT_NUMBER);
    }

    public function getGeneralSenderName(): ?string
    {
        return $this->getConfigValue(self::GENERAL_SENDER_NAME);
    }

    public function getGeneralSenderEmail(): ?string
    {
        return $this->getConfigValue(self::GENERAL_SENDER_EMAIL);
    }

    public function getSalesSenderName(): ?string
    {
        return $this->getConfigValue(self::SALES_SENDER_NAME);
    }

    public function getSalesSenderEmail(): ?string
    {
        return $this->getConfigValue(self::SALES_SENDER_EMAIL);
    }

    public function getSupportSenderName(): ?string
    {
        return $this->getConfigValue(self::SUPPORT_SENDER_NAME);
    }

    public function getSupportSenderEmail(): ?string
    {
        return $this->getConfigValue(self::SUPPORT_SENDER_EMAIL);
    }
    public function getCustom1SenderName(): ?string
    {
        return $this->getConfigValue(self::CUSTOM1_SENDER_NAME);
    }

    public function getCustom1SenderEmail(): ?string
    {
        return $this->getConfigValue(self::CUSTOM1_SENDER_EMAIL);
    }

    public function getCustom2SenderName(): ?string
    {
        return $this->getConfigValue(self::CUSTOM2_SENDER_NAME);
    }

    public function getCustom2SenderEmail(): ?string
    {
        return $this->getConfigValue(self::CUSTOM2_SENDER_EMAIL);
    }

    public function getEmailSenderByName(?string $name = ''): array
    {
        switch ($name) {
            case 'sales':
                return [
                    'name' => $this->getSalesSenderName(),
                    'email' => $this->getSalesSenderEmail()
                ];
            case 'support':
                return [
                    'name' => $this->getSupportSenderName(),
                    'email' => $this->getSupportSenderEmail()
                ];
            case 'custom1':
                return [
                    'name' => $this->getCustom1SenderName(),
                    'email' => $this->getCustom1SenderEmail()
                ];
            case 'custom2':
                return [
                    'name' => $this->getCustom2SenderName(),
                    'email' => $this->getCustom2SenderEmail()
                ];
            default:
                return [
                    'name' => $this->getGeneralSenderName(),
                    'email' => $this->getGeneralSenderEmail()
                ];
        }
    }
}