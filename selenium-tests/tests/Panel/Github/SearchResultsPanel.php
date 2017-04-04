<?php

namespace My\Panel\Github;

use Lmc\Steward\Component\AbstractComponent;

class SearchResultsPanel extends AbstractComponent
{
    const FOUND_ITEMS_SELECTOR = 'ul h3 a';

    /**
     * @return string[]
     */
    public function getFoundItems()
    {
        $foundItemsElements = $this->getFoundItemsElements();

        $foundItems = [];
        foreach ($foundItemsElements as $element) {
            $foundItems[] = $element->getText();
        }

        return $foundItems;
    }

    /**
     * @param $index
     * @return ProjectDetailPanel
     */
    public function openResultOnIndex($index)
    {
        $foundItemsElements = $this->getFoundItemsElements();

        $foundItemsElements[$index]->click();

        // Wait until project detail is loaded
        $projectDetail = new ProjectDetailPanel($this->tc);
        $projectDetail->waitUntilLoaded();

        return $projectDetail;
    }

    /**
     * @return \Facebook\WebDriver\Remote\RemoteWebElement[]
     */
    private function getFoundItemsElements()
    {
        return $this->findMultipleByCss(self::FOUND_ITEMS_SELECTOR);
    }
}
