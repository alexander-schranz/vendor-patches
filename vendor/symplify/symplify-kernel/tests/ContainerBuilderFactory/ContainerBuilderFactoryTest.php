<?php

declare (strict_types=1);
namespace VendorPatches202301\Symplify\SymplifyKernel\Tests\ContainerBuilderFactory;

use VendorPatches202301\PHPUnit\Framework\TestCase;
use VendorPatches202301\Symplify\SmartFileSystem\SmartFileSystem;
use VendorPatches202301\Symplify\SymplifyKernel\Config\Loader\ParameterMergingLoaderFactory;
use VendorPatches202301\Symplify\SymplifyKernel\ContainerBuilderFactory;
final class ContainerBuilderFactoryTest extends TestCase
{
    public function test() : void
    {
        $containerBuilderFactory = new ContainerBuilderFactory(new ParameterMergingLoaderFactory());
        $containerBuilder = $containerBuilderFactory->create([__DIR__ . '/config/some_services.php'], [], []);
        $hasSmartFileSystemService = $containerBuilder->has(SmartFileSystem::class);
        $this->assertTrue($hasSmartFileSystemService);
    }
}
