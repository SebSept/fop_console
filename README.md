# Console for PrestaShop 1.7

This repository provides a Command that better supports PrestaShop legacy classes using the current PrestaShop Console and a list
of useful commands that you can use and reuse for learning purposes.

This module is released under AFL license.

## Install

```
cd modules 
git clone https://github.com/friends-of-presta/fop_console.git
cd fop_console
composer install
cd ../../
php bin/console pr:mo install fop_console
```

## Current commands

* `fop:clear-cache` Clear the cache folder super fast
* `fop:debug-mode` Enable or Disable debug mode
* `fop:shop-status` Display shop(s) status(es)
* `fop:maintenance` get status or change maintenance mode, list or add maintenance ip address
* `fop:images:generate:categories` Regenerate categories thumbnails
* `fop:images:generate:manufacturers` Regenerate manufacturers thumbnails
* `fop:images:generate:products` Regenerate products thumbnails
* `fop:images:generate:stores` Regenerate stores thumbnails
* `fop:images:generate:suppliers` Regenerate suppliers thumbnails
* `fop:generate:htaccess` Generate the .htaccess file
* `fop:generate:robots`   Generate the robots.txt file
* `fop:theme-reset` Reset current (or selected) theme
* `fop:add-hook` : Create a new hook in database
* `fop:unhook-module` : Ungraft module on specific hook
* `fop:hook-module` : Graft module on specific hook
* `fop:latest-products`: Displays the latest products
* `fop:export`: Exports object models in XML
* `fop:check-container`   Health check of the Service Container, for now list the services we can't use in Symfony commands
* `fop:configuration:export` Export configuration values to a json file
* `fop:configuration:import` Import configuration values from a json file

## Create your owns Commands

The official documentation from PrestaShop and Symfony Core teams are still right, but you needs
to extends our class.

```php
<?php

namespace Your\Own\Namespace;

use FOP\Console\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


/**
 * This command is a working exemple.
 */
final class Export extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('hello:world');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $io->text('Hello friends of PrestaShop!');
    }
}
```

## What's next?

The current strategy is to configure a Context before the execution of the Command.
This works well but we like to make it more configurable from the Console arguments.

## Contribute

Feel free to add more commands, post some issues or new PR : contributions are very welcome.

## Compatibility

| Prestashop Version | Compatible |
| ------------------ | -----------|
| 1.7.0.x | :x: |
| 1.7.1.x | :x: |
| 1.7.2.x | :x: |
| 1.7.3.x | :x: |
| 1.7.4.x | :x: |
| 1.7.5.x | :heavy_check_mark: |
| 1.7.6.x | :heavy_check_mark: |
| 1.7.7.x | :heavy_check_mark: |

| Php Version | Compatible |
| ------ | -----------|
| 5.6 | :x:|
| 7.0 | :x: |
| 7.1 | :x: |
| 7.2 | :heavy_check_mark: |
| 7.3| :heavy_check_mark: |
| 7.4 | :interrobang: Not yet tested |
| 8.0 | :interrobang: Not yet tested |
