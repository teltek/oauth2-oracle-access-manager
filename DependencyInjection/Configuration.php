<?php

namespace Teltek\Oauth2OracleAccessManagerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('teltek_oauth2_oracle_access_manager');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->children()
                ->booleanNode('enable')
                    ->defaultFalse()
                    ->info('Define if oauth2 is enabled')
                ->end()
                ->scalarNode('clientId')
                    ->defaultValue(null)
                    ->info('clientId of oam')
                ->end()
                ->scalarNode('clientSecret')
                    ->defaultValue(null)
                    ->info('clienteSecret of oam')
                ->end()
                ->scalarNode('redirectUri')
                    ->defaultValue(null)
                    ->info('define redirect uri on oam')
                ->end()
                ->scalarNode('urlAuthorize')
                    ->defaultValue(null)
                    ->info('url authorize')
                ->end()
                ->scalarNode('urlAccessToken')
                    ->defaultValue(null)
                    ->info('url access token')
                ->end()
                ->scalarNode('urlResourceOwnerDetails')
                    ->defaultValue(null)
                    ->info('urlResourceOwnerDetails')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
