<?php

declare (strict_types=1);
namespace VendorPatches202301\Symplify\PackageBuilder\Console\Input;

use VendorPatches202301\Symfony\Component\Console\Input\ArgvInput;
/**
 * @api
 */
final class StaticInputDetector
{
    public static function isDebug() : bool
    {
        $argvInput = new ArgvInput();
        return $argvInput->hasParameterOption(['--debug', '-v', '-vv', '-vvv']);
    }
}
