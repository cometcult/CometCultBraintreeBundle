<?php

namespace CometCult\BraintreeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('comet_cult_braintree');

        $rootNode
            ->children()
                ->scalarNode('environment')
                    ->defaultValue('sandbox')
                    ->info('environment for the Braintree API')
                ->end()
                ->scalarNode('merchant_id')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->info('your Braintree merchant id')
                ->end()
                ->scalarNode('public_key')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->info('your Braintree public key')
                ->end()
                ->scalarNode('private_key')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->info('your Braintree private key')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
