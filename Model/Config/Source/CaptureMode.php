<?php
/**
 *                       ######
 *                       ######
 * ############    ####( ######  #####. ######  ############   ############
 * #############  #####( ######  #####. ######  #############  #############
 *        ######  #####( ######  #####. ######  #####  ######  #####  ######
 * ###### ######  #####( ######  #####. ######  #####  #####   #####  ######
 * ###### ######  #####( ######  #####. ######  #####          #####  ######
 * #############  #############  #############  #############  #####  ######
 *  ############   ############  #############   ############  #####  ######
 *                                      ######
 *                               #############
 *                               ############
 *
 * Adyen Payment module (https://www.adyen.com/)
 *
 * Copyright (c) 2015 Adyen BV (https://www.adyen.com/)
 * See LICENSE.txt for license details.
 *
 * Author: Adyen <magento@adyen.com>
 */

namespace Adyen\Payment\Model\Config\Source;

class CaptureMode implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * @var \Magento\Sales\Model\Order\Config
     */
    protected $_orderConfig;

    /**
     * @var \Adyen\Payment\Helper\Data
     */
    protected $_adyenHelper;


    /**
     * @param \Magento\Sales\Model\Order\Config $orderConfig
     * @param \Adyen\Payment\Helper\Data $adyenHelper
     */
    public function __construct(
        \Magento\Sales\Model\Order\Config $orderConfig,
        \Adyen\Payment\Helper\Data $adyenHelper
    )
    {
        $this->_orderConfig = $orderConfig;
        $this->_adyenHelper = $adyenHelper;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $recurringTypes = $this->_adyenHelper->getCaptureModes();

        foreach ($recurringTypes as $code => $label) {
            $options[] = ['value' => $code, 'label' => $label];
        }
        return $options;
    }
}
