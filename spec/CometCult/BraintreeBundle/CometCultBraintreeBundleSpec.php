<?php

namespace spec\CometCult\BraintreeBundle;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CometCultBraintreeBundleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CometCult\BraintreeBundle\CometCultBraintreeBundle');
    }

    function it_should_be_a_bundle()
    {
        $this->shouldHaveType('Symfony\Component\HttpKernel\Bundle\Bundle');
    }
}
