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

use Yosymfony\EmbeddedComposer\EmbeddedComposer;
use Yosymfony\EmbeddedComposer\EmbeddedComposerBuilder;

class EmbeddedComposerBuilderTest extends \PHPUnit_Framework_TestCase
{
    /** @var Composer\Autoload\ClassLoader */
    protected $classloader;

    public function setUp()
    {
        $autoloaders = spl_autoload_functions();
        $this->classloader = $autoloaders[0][0];
    }

    public function testBuild()
    {
        $builder = new EmbeddedComposerBuilder($this->classloader);
        $this->assertInstanceOf(EmbeddedComposer::class, $builder->build());
    }
}
