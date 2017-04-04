<?php

namespace My;

use Lmc\Steward\Test\AbstractTestCase;

/**
 * @group simple
 */
class GithubSearchTest extends AbstractTestCase
{
    public function testShouldSubmitSearchFromHeaderAndShowResults()
    {
        $this->wd->get('https://github.com/');

        $searchInput = $this->findByCss('.header-search-input');

        $searchInput
            ->sendKeys('symfony')
            ->submit();

        $this->waitForTitle('Search · symfony · GitHub');

        $firstItem = $this->findByCss('ul h3 a');

        $this->assertSame(
            'symfony/symfony',
            $firstItem->getText()
        );

        $firstItem->click();

        $this->waitForTitle('GitHub - symfony/symfony: The Symfony PHP framework');

        $headerText = $this->findByCss('h1')
            ->getText();

        $this->assertSame('symfony/symfony', $headerText);
    }
}
