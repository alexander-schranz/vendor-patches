<?php

declare (strict_types=1);
namespace VendorPatches20220610\Symplify\VendorPatches\Kernel;

use VendorPatches20220610\Psr\Container\ContainerInterface;
use VendorPatches20220610\Symplify\ComposerJsonManipulator\ValueObject\ComposerJsonManipulatorConfig;
use VendorPatches20220610\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel;
final class VendorPatchesKernel extends AbstractSymplifyKernel
{
    /**
     * @param string[] $configFiles
     */
    public function createFromConfigs(array $configFiles) : ContainerInterface
    {
        $configFiles[] = __DIR__ . '/../../config/config.php';
        $configFiles[] = ComposerJsonManipulatorConfig::FILE_PATH;
        return $this->create($configFiles);
    }
}
