<?php
/**
 *
 * @category  AuthorizeNet
 * @package   AuthorizeNet_CreditCard
 */

namespace AuthorizeNet\CreditCard\Gateway\Config;

class Config extends \AuthorizeNet\Core\Gateway\Config\Config
{
    public const CODE = 'anet_creditcard';
    public const VAULT_CODE = 'anet_creditcard_vault';

    public const KEY_CC_TYPES = 'cctypes';
    public const KEY_CENTINEL_ACTIVE = 'centinel_active';
    public const KEY_REQUIRE_CVV = 'require_cvv';
    public const KEY_ADMIN_REQUIRE_CVV = 'admin_require_cvv';

    /**
     * Retrieve available credit card types
     *
     * @return array
     */
    public function getAvailableCardTypes()
    {
        $ccTypes = $this->getConfigValue(self::KEY_CC_TYPES);

        return !empty($ccTypes) ? explode(',', $ccTypes) : [];
    }

    /**
     * Get CVV for Vault on Front-end
     *
     * @return bool
     */
    public function getVaultRequireCvv()
    {
        return (bool)$this->getConfigValue(self::KEY_REQUIRE_CVV, self::VAULT_CODE);
    }

    /**
     * Get CVV for Vault on Back-end
     *
     * @return bool
     */
    public function getVaultAdminRequireCvv()
    {
        return (bool)$this->getConfigValue(self::KEY_ADMIN_REQUIRE_CVV, self::VAULT_CODE);
    }

    /**
     * Check 3D secure card validation enable or not
     *
     * @return bool
     */
    public function isCentinelActive()
    {
        return (bool)$this->getConfigValue(self::KEY_CENTINEL_ACTIVE);
    }
}
