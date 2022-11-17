<?php

namespace BennoThommo\GlacierSkin\Skins;

use Backend\Skins\Standard as BackendSkin;

/**
 * Glacier custom backend skin
 */
class Glacier extends BackendSkin
{
    /**
     * {@inheritDoc}
     */
    public function getLayoutPaths()
    {
        return [
            plugins_path('/bennothommo/glacierskin/skins/glacier/layouts'),
            $this->skinPath . '/layouts'
        ];
    }
}
