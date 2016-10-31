<?php


class Webgriffe_GoogleAdwords_Block_Conversion extends Mage_Core_Block_Abstract
{
    protected function _toHtml()
    {
        if (!Mage::helper('webgriffe_googleadwords')->isEnabled()) {
            return '';
        }
        $orderIds = $this->getOrderIds();
        if (empty($orderIds) || !is_array($orderIds)) {
            return '';
        }
        if (count($orderIds) > 1) {
            // TODO Define Google AdWords Conversion logic in case of multishipping checkout (i.e. multiple orders)
            return '';
        }
        $orderId = $orderIds[0];

        $order = Mage::getModel('sales/order')->load($orderId);
        if (!$order || !$order->getId()) {
            return '';
        }

        $accountId = Mage::helper('webgriffe_googleadwords')->getAccountId();
        $conversionLanguage = Mage::helper('webgriffe_googleadwords')->getConversionLanguage();
        $conversionFormat = Mage::helper('webgriffe_googleadwords')->getConversionFormat();
        $conversionColor = Mage::helper('webgriffe_googleadwords')->getConversionColor();
        $conversionLabel = Mage::helper('webgriffe_googleadwords')->getConversionLabel();
        $conversionValue = $order->getBaseGrandTotal();
        $conversionCurrency = $order->getBaseCurrencyCode();
        // @codingStandardsIgnoreStart
        return <<<HTML
<!-- Google AdWords Conversion Code -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = {$accountId};
var google_conversion_language = "{$conversionLanguage}";
var google_conversion_format = "{$conversionFormat}";
var google_conversion_color = "{$conversionColor}";
var google_conversion_label = "{$conversionLabel}";
var google_conversion_value = {$conversionValue};
var google_conversion_currency = "{$conversionCurrency}";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript"  
src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt=""  
src="//www.googleadservices.com/pagead/conversion/{$accountId}/?value={$conversionValue}&amp;currency_code={$conversionCurrency}&amp;label={$conversionLabel}&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
HTML;
        // @codingStandardsIgnoreEnd
    }
}
