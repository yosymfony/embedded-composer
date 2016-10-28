<?php

/*
 * This file is a part of Yosymfony/embedded-composer and it's
 * based on dflydev/embedded-composer by Dragonfly Development Inc.
 *
 * (c) Victor Puertas.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yosymfony\EmbeddedComposer;

/**
 * Embedded Composer Aware Interface.
 *
 * @author Beau Simensen <beau@dflydev.com>
 */
interface EmbeddedComposerAwareInterface
{
    /**
     * Embedded Composer.
     *
     * @return EmbeddedComposer
     */
    public function getEmbeddedComposer();
}
