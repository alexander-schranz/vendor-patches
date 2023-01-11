<?php

declare (strict_types=1);
namespace VendorPatches202301;

use VendorPatches202301\Symfony\Component\Console\Style\SymfonyStyle;
use VendorPatches202301\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use VendorPatches202301\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory;
use VendorPatches202301\Symplify\PackageBuilder\Parameter\ParameterProvider;
use VendorPatches202301\Symplify\PackageBuilder\Reflection\PrivatesAccessor;
use VendorPatches202301\Symplify\SmartFileSystem\FileSystemFilter;
use VendorPatches202301\Symplify\SmartFileSystem\FileSystemGuard;
use VendorPatches202301\Symplify\SmartFileSystem\Finder\FinderSanitizer;
use VendorPatches202301\Symplify\SmartFileSystem\Finder\SmartFinder;
use VendorPatches202301\Symplify\SmartFileSystem\SmartFileSystem;
use function VendorPatches202301\Symfony\Component\DependencyInjection\Loader\Configurator\service;
return static function (ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire();
    // symfony style
    $services->set(SymfonyStyleFactory::class);
    $services->set(SymfonyStyle::class)->factory([service(SymfonyStyleFactory::class), 'create']);
    // filesystem
    $services->set(FinderSanitizer::class);
    $services->set(SmartFileSystem::class);
    $services->set(SmartFinder::class);
    $services->set(FileSystemGuard::class);
    $services->set(FileSystemFilter::class);
    $services->set(ParameterProvider::class)->args([service('service_container')]);
    $services->set(PrivatesAccessor::class);
};
