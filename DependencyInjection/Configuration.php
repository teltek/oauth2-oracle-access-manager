<?php

declare(strict_types=1);

namespace Teltek\Oauth2OracleAccessManagerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('teltek_oauth2_oracle_access_manager');

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
