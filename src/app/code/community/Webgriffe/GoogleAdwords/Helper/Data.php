<?php

class Webgriffe_GoogleAdwords_Helper_Data extends Mage_Core_Helper_Abstract
{
    const ENABLED_CONFIG_PATH = 'google/adwords/enabled';
    const ACCOUNT_ID_CONFIG_PATH = 'google/adwords/account_id';
    const CONVERSION_LANGUAGE_CONFIG_PATH = 'google/adwords/conversion_language';
    const CONVERSION_FORMAT_CONFIG_PATH = 'google/adwords/conversion_format';
    const CONVERSION_COLOR_CONFIG_PATH = 'google/adwords/conversion_color';
    const CONVERSION_LABEL_CONFIG_PATH = 'google/adwords/conversion_label';

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return Mage::getStoreConfigFlag(self::ENABLED_CONFIG_PATH);
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
        return (int)Mage::getStoreConfig(self::ACCOUNT_ID_CONFIG_PATH);
    }

    /**
     * @return string
     */
    public function getConversionLanguage()
    {
        return (string)Mage::getStoreConfig(self::CONVERSION_LANGUAGE_CONFIG_PATH);
    }

    /**
     * @return string
     */
    public function getConversionFormat()
    {
        return (string)Mage::getStoreConfig(self::CONVERSION_FORMAT_CONFIG_PATH);
    }

    /**
     * @return string
     */
    public function getConversionColor()
    {
        return (string)Mage::getStoreConfig(self::CONVERSION_COLOR_CONFIG_PATH);
    }

    /**
     * @return string
     */
    public function getConversionLabel()
    {
        return (string)Mage::getStoreConfig(self::CONVERSION_LABEL_CONFIG_PATH);
    }
}
