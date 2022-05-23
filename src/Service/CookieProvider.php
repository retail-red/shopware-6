<?php

declare(strict_types=1);

namespace Shopgate\Shopware\ClickAndReserve\Service;

use Shopgate\Shopware\ClickAndReserve\System\Configurations;
use Shopware\Storefront\Framework\Cookie\CookieProviderInterface;

class CookieProvider implements CookieProviderInterface
{
    /** @var CookieProviderInterface */
    private $originalService;
    /** @var Configurations */
    private $configurations;
    
    /**
     * @param CookieProviderInterface $service
     * @param Configurations $configurations
     */
    public function __construct(CookieProviderInterface $service, Configurations $configurations)
    {
        $this->originalService = $service;
        $this->configurations = $configurations;
    }
    
    private const customerSaveCookie = [
        'snippet_name' => 'cookie.sgSaveCustomerData',
        'cookie' => 'sg-save-customer-data-enabled',
        'value' => '1'
    ];
    
    /**
     * To show or not show our custom cookie in cookie drawer
     *
     * @return array
     */
    public function getCookieGroups(): array
    {
        /**
         * Don't show if "On", "Off", "Checkbox
         */
        $default = $this->configurations->getSaveCustomerData(null);
        if (in_array($default, [
            Configurations::COOKIE_DEFAULT_OPTION_ENABLED,
            Configurations::COOKIE_DEFAULT_OPTION_DISABLED,
            Configurations::COOKIE_DEFAULT_OPTION_CHECKBOX
        ], true)) {
            return $this->originalService->getCookieGroups();
        }
        $returnGroups = [];
        $cookieGroups = $this->originalService->getCookieGroups();
        foreach ($cookieGroups as $cookieGroup) {
            $groupName = $cookieGroup['snippet_name'];
            if (!isset($returnGroups[$groupName])) {
                $returnGroups[$groupName] = $cookieGroup;
            }
            
            if ($groupName === 'cookie.groupComfortFeatures') {
                $returnGroups[$groupName]['entries'][] = self::customerSaveCookie;
            }
        }
        
        return $returnGroups;
    }
}
