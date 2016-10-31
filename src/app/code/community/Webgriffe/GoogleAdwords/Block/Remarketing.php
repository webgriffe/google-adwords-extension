<?php


class Webgriffe_GoogleAdwords_Block_Remarketing extends Mage_Core_Block_Abstract
{
    protected function _toHtml()
    {
        if (!Mage::helper('webgriffe_googleadwords')->isEnabled()) {
            return '';
        }

        $accountId = Mage::helper('webgriffe_googleadwords')->getAccountId();
        // @codingStandardsIgnoreStart
        return <<<HTML
<!-- Google AdWords Remarketing Code -->
<script type="text/javascript">
var google_tag_params = {
dynx_itemid: 'REPLACE_WITH_VALUE',
dynx_itemid2: 'REPLACE_WITH_VALUE',
dynx_pagetype: 'REPLACE_WITH_VALUE',
dynx_totalvalue: 'REPLACE_WITH_VALUE'
};
</script>
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = {$accountId};
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/{$accountId}/?guid=ON&amp;script=0"/>
</div>
</noscript>
HTML;
        // @codingStandardsIgnoreEnd
    }
}
