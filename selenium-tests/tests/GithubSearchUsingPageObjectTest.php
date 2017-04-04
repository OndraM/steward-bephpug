<?php

namespace My;

use Lmc\Steward\Test\AbstractTestCase;
use My\Panel\Github\NavigationPanel;

/**
 * @group pageobject
 */
class GithubSearchUsingPageObjectTest extends AbstractTestCase
{
    public function testShouldSubmitSearchFormAndShowSearchResults()
    {
        $this->wd->get('https://github.com/');

        $navigationPanel = new NavigationPanel($this);

        $searchResultsPanel = $navigationPanel->submitSearchWithQuery('symfony');

        $foundItems = $searchResultsPanel->getFoundItems();
        $this->assertSame('symfony/symfony', $foundItems[0]);

        $projectDetail = $searchResultsPanel->openResultOnIndex(0);

        $projectDetailHeader = $projectDetail->getHeader();
        $this->assertSame('symfony/symfony', $projectDetailHeader);
    }
}
