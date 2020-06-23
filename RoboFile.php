<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    // define public methods as commands
    public function fixphp() {
      $this->taskExec('php72 vendor/bin/php-cs-fixer fix src')->run();
    }
}
