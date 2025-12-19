<?php

declare(strict_types=1);

namespace Shopgate\Shopware\ClickAndReserve\System;

use Shopware\Core\Framework\Struct\Struct;
use Shopware\Core\System\SystemConfig\SystemConfigService;

class Configurations extends Struct
{
    public const PREFIX = 'SgateClickAndReserveSW6.config.';
    public const SAVE_CUSTOMER_DATA = self::PREFIX . 'saveCustomerData';

    public const COOKIE_DEFAULT_OPTION_ENABLED = 'on';
    public const COOKIE_DEFAULT_OPTION_DISABLED = 'off';
    public const COOKIE_DEFAULT_OPTION_CHECKBOX = 'checkbox';

    /** @var SystemConfigService */
    private $configService;

    /**
     * @var array<string, mixed>
     */
    private $config = [];

    /**
     * @param SystemConfigService $configService
     */
    public function __construct(SystemConfigService $configService)
    {
        $this->configService = $configService;
    }

    /**
     * @param string $key
     * @param string|null $channelId
     * @param mixed $default
     * @return mixed
     */
    private function get(string $key, ?string $channelId, $default = null)
    {
        $configValue = $this->configService->get($key, $channelId);
        if ($configValue === null || (is_string($configValue) && trim($configValue) === '')) {
            return $default;
        }

        return $configValue;
    }

    /**
     * @return array<string, mixed>
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param string|null $channelId - uses global if null
     * @return string
     */
    public function getSaveCustomerData(?string $channelId): string
    {
        return (string)$this->get(self::SAVE_CUSTOMER_DATA, $channelId, self::COOKIE_DEFAULT_OPTION_DISABLED);
    }
}
