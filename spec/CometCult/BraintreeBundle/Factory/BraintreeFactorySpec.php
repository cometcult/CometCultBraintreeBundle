<?php

namespace spec\CometCult\BraintreeBundle\Factory;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use CometCult\BraintreeBundle\Exception\InvalidServiceException;

class BraintreeFactorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('sandbox', 'test_merchant_id', 'test_public_key', 'test_private_key');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('CometCult\BraintreeBundle\Factory\BraintreeFactory');
    }

    function it_should_get_available_service()
    {
        $this->get('customer')->shouldHaveType('Braintree_Customer');
        $this->get('creditCard')->shouldHaveType('Braintree_CreditCard');
    }

    function it_should_throw_exception_if_getting_not_available_service()
    {
        $this->shouldThrow(new InvalidServiceException('Invalid service imaginary_service'))
            ->duringGet('imaginary_service');
    }
}
