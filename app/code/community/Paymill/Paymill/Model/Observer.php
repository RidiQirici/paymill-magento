<?php

/**
 * Magento
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Open Software License (OSL 3.0)  
 * that is bundled with this package in the file LICENSE.txt.  
 * It is also available through the world-wide-web at this URL:  
 * http://opensource.org/licenses/osl-3.0.php  
 * If you did not receive a copy of the license and are unable to  
 * obtain it through the world-wide-web, please send an email  
 * to license@magentocommerce.com so we can send you a copy immediately.  
 * 
 * @category Paymill  
 * @package Paymill_Paymill  
 * @copyright Copyright (c) 2013 PAYMILL GmbH (https://paymill.com/en-gb/)  
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)  
 */
class Paymill_Paymill_Model_Observer
{

    /**
     * Registered for the checkout_onepage_controller_success_action event
     * Generates the invoice for the current order
     * 
     * @param Varien_Event_Observer $observer
     */
    public function generateInvoice(Varien_Event_Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        if ($order->getPayment()->getMethod() === 'paymill_creditcard') {
            $data = $order->getPayment()->getAdditionalInformation();

            if (array_key_exists('paymillPreauthId', $data) && !empty($data['paymillPreauthId'])) {
                Mage::helper('paymill/loggingHelper')->log("Debug", "No Invoice generated, since the transaction is flagged as preauth");
            } else {
                Mage::helper('paymill/paymentHelper')->invoice(
                    $order, 
                    $data['paymillTransactionId'],
                    Mage::getStoreConfig(
                        'payment/paymill_creditcard/send_invoice_mail', 
                        Mage::app()->getStore()->getStoreId()
                    )
                );
            }
        }
    }
}

