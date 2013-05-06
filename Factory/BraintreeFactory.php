<?php

namespace CometCult\BraintreeBundle\Factory;

use CometCult\BraintreeBundle\Exception\InvalidServiceException;
use Braintree_Configuration;

class BraintreeFactory
{
    public function __construct($environment, $merchantId, $publicKey, $privateKey)
    {
        Braintree_Configuration::environment($environment);
        Braintree_Configuration::merchantId($merchantId);
        Braintree_Configuration::publicKey($publicKey);
        Braintree_Configuration::privateKey($privateKey);
    }

    public function get($serviceName, array $attributes = array())
    {
        $className = 'Braintree_' . ucfirst($serviceName);
        if(class_exists($className) && method_exists($className, 'factory')) {
            return $className::factory($attributes);
        } else {
            throw new InvalidServiceException('Invalid service ' . $serviceName);
        }
    }
}
