<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

require 'quote_with_address.php';
/** @var \Magento\Quote\Model\Quote $quote */

/** @var $rate \Magento\Quote\Model\Quote\Address\Rate */
$rate = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create('Magento\Quote\Model\Quote\Address\Rate');
$rate->setCode('freeshipping_freeshipping');
$rate->getPrice(1);

$quote->getShippingAddress()->setShippingMethod('freeshipping_freeshipping');
$quote->getShippingAddress()->addShippingRate($rate);
$quote->getPayment()->setMethod('checkmo');

$quote->collectTotals();
$quote->save();
$quote->getPayment()->setMethod('checkmo');
