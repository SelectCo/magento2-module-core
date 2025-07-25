<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace SelectCo\Core\Mail;

use Magento\Framework\App\Area;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\MailException;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Mail\Template\TransportBuilderFactory;

class Sender
{
    /**
     * @var TransportBuilderFactory
     */
    private $transportBuilderFactory;

    public function __construct(TransportBuilderFactory $transportBuilderFactory)
    {
        $this->transportBuilderFactory = $transportBuilderFactory;
    }

    /**
     * @param string $emailTo
     * @param array $emailSender
     * @param string $templateId
     * @param string|null $area
     * @param int|null $storeId
     * @param array|null $templateVars
     * @return void
     * @throws LocalizedException
     * @throws MailException
     */
    public function send(string $emailTo, array $emailSender, string $templateId, ?string $area = null, ?int $storeId = null, ?array $templateVars = [])
    {
        $area = $area ?? Area::AREA_FRONTEND;
        $storeId = $storeId ?? 1;

        /** @var TransportBuilder $transportBuilder */
        $transportBuilder = $this->transportBuilderFactory->create();

        $transportBuilder->addTo(explode(',', str_replace(' ', '', $emailTo)));
        $transportBuilder->setFromByScope($emailSender);
        $transportBuilder->setTemplateIdentifier($templateId);
        $transportBuilder->setTemplateVars($templateVars);
        $transportBuilder->setTemplateOptions([
            'area' => $area,
            'store' => $storeId
        ]);

        $transportBuilder->getTransport()->sendMessage();
    }
}
