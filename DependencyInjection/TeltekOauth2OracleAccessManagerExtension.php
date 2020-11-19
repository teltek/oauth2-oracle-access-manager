<?php

declare(strict_types=1);

namespace Teltek\Oauth2OracleAccessManagerBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class TeltekOauth2OracleAccessManagerExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('teltek_oauth2_oracle_access_manager', $config);
        $container->setParameter('teltek_oauth2_oracle_access_manager.enable', $config['enable']);
        $container->setParameter('teltek_oauth2_oracle_access_manager.clientId', $config['clientId']);
        $container->setParameter('teltek_oauth2_oracle_access_manager.clientSecret', $config['clientSecret']);
        $container->setParameter('teltek_oauth2_oracle_access_manager.redirectUri', $config['redirectUri']);
        $container->setParameter('teltek_oauth2_oracle_access_manager.urlAuthorize', $config['urlAuthorize']);
        $container->setParameter('teltek_oauth2_oracle_access_manager.urlAccessToken', $config['urlAccessToken']);
        $container->setParameter('teltek_oauth2_oracle_access_manager.urlResourceOwnerDetails', $config['urlResourceOwnerDetails']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
    }
}
