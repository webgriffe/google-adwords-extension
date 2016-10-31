<?php


class Webgriffe_GoogleAdwords_Model_Observer
{
    public function setConversionOrderIds(Varien_Event_Observer $observer)
    {
        $orderIds = $observer->getEvent()->getOrderIds();
        if (empty($orderIds) || !is_array($orderIds)) {
            return;
        }
        $block = Mage::app()->getFrontController()->getAction()->getLayout()->getBlock('google_adwords.conversion');
        if ($block) {
            $block->setOrderIds($orderIds);
        }
    }
}
