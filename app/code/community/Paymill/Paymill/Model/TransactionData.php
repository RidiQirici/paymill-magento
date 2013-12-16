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
class Paymill_Paymill_Model_TransactionData
{

    private $_preAuthorizationFlag;
    private $_transactionId;
    private $_clientId;
    private $_paymentId;

    /**
     * Returns the state of the PreAuthorizationFlag
     * @return Boolean
     */
    public function getPreAuthorizationFlag()
    {
        return $this->_preAuthorizationFlag;
    }

    /**
     * Returns the TransactionId as a string
     * @return String
     */
    public function getTransactionId()
    {
        return $this->_transactionId;
    }

    /**
     * Sets the PreAuthorizationFlag
     * @param Boolean $flag
     */
    public function setPreAuthorizationFlag($flag)
    {
        $this->_preAuthorizationFlag = $flag;
    }

    /**
     * Sets the transaction id
     * @param String $id
     */
    public function setTransactionId($id)
    {
        $this->_transactionId = $id;
    }

    public function getClientId()
    {
        return $this->_clientId;
    }

    public function setClientId($clientId)
    {
        $this->_clientId = $clientId;
    }

    public function getPaymentId()
    {
        return $this->_paymentId;
    }

    public function setPaymentId($paymentId)
    {
        $this->_paymentId = $paymentId;
    }
}