<?php

namespace BCSample\Shipping;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait {
        registerBundles as private microRegisterBundles;
        registerContainerConfiguration as private microRegisterContainerConfiguration;
    }

    public function registerBundles(): iterable
    {
        return $this->microRegisterBundles();
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $this->microRegisterContainerConfiguration($loader);
    }

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->import('../config/{packages}/*.yaml');
        $container->import('../config/{packages}/'.$this->environment.'/*.yaml');
        $container->import('../config/services.yaml');
        $container->import('../config/services_'.$this->environment.'.yaml', null, true);
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import('../config/routes.yaml');
        $routes->import('../config/routes_'.$this->environment.'.yaml', null, true);
    }
}
