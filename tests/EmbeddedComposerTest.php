<?php

/*
 * This file is part of the Yosymfony/embedded-composer.
 *
 * (c) YoSymfony <http://github.com/yosymfony>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yosymfony\EmbeddedComposer\Tests;

use Composer\Autoload\ClassLoader;
use Composer\Composer;
use Composer\Installer;
use Composer\IO\BufferIO;
use Yosymfony\EmbeddedComposer\EmbeddedComposer;
use Yosymfony\EmbeddedComposer\EmbeddedComposerBuilder;

class EmbeddedComposerTest extends \PHPUnit_Framework_TestCase
{
    /** @var EmbeddedComposer */
    protected $embeddedComposer;

    public function setUp()
    {
        $autoloaders = spl_autoload_functions();
        $classloader = $autoloaders[0][0];
        $builder = new EmbeddedComposerBuilder($classloader);

        $this->embeddedComposer = $builder->build();
    }

    public function testGetClassLoader()
    {
        $this->assertInstanceOf(ClassLoader::class, $this->embeddedComposer->getClassLoader());
    }

    public function testCreateComposer()
    {
        $io = new BufferIO();
        $composer = $this->embeddedComposer->createComposer($io);

        $this->assertInstanceOf(Composer::class, $composer);
    }

    public function testCreateInstaller()
    {
        $io = new BufferIO();
        $composer = $this->embeddedComposer->createComposer($io);
        $installer = $this->embeddedComposer->createInstaller($composer, $io);

        $this->assertInstanceOf(Installer::class, $installer);
    }
}
