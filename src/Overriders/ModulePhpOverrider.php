<?php
/**
 * 2020-present Friends of Presta community
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @author    Friends of Presta community
 * @copyright 2020-present Friends of Presta community
 * @license   https://opensource.org/licenses/MIT MIT
 */

namespace FOP\Console\Overriders;

use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Module php Overrider.
 *
 * Override a module php file.
 * For example modules/ps_searchbar/ps_searchbar.php will result in override/modules/ps_searchbar/ps_searchbar.php
 *
 */
final class ModulePhpOverrider extends AbstractOverrider implements OverriderInterface
{
    public function run(string $path, SymfonyStyle $io): void
    {
        // this overrider applies only on README.md files
        $matches = [];
        $module_name_matched = 0 < preg_match('/modules\/([\w_-]*)\//', $path, $matches);
        if ($module_name_matched) {
            $module_name = $matches[1];
            if ($io->isVerbose())
            {
                $io->text("Will try to override  $module_name");
            }
            $fs = new Filesystem();
            $fs->copy($path, 'override'.$path, true);
        }
        else {
            $io->text('Nop');
        }

        $this->handled = true;

    }
}
