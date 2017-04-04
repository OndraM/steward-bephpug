<?php

namespace My\Panel\Github;

use Lmc\Steward\Component\AbstractComponent;

class ProjectDetailPanel extends AbstractComponent
{
    const REPOSITORY_META_SELECTOR = '.repository-content';
    const HEADER_SELECTOR = 'h1';

    /**
     * @return string
     */
    public function getHeader()
    {
        return $this->findByCss(self::HEADER_SELECTOR)
            ->getText();
    }

    public function waitUntilLoaded()
    {
        $this->waitForCss(self::REPOSITORY_META_SELECTOR);
    }
}
