<?php

namespace My\Panel\Github;

use Lmc\Steward\Component\AbstractComponent;

class NavigationPanel extends AbstractComponent
{
    const SEARCH_INPUT_SELECTOR = '.header-search-input';

    /**
     * @param string $query
     * @return SearchResultsPanel
     */
    public function submitSearchWithQuery($query)
    {
        $searchInput = $this->findByCss(self::SEARCH_INPUT_SELECTOR);

        $searchInput
            ->sendKeys($query)
            ->submit();

        $this->waitForTitle('Search · ' . $query . ' · GitHub');

        return new SearchResultsPanel($this->tc);
    }
}
