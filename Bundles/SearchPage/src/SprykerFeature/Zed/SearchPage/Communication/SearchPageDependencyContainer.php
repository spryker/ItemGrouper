<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerFeature\Zed\SearchPage\Communication;

use SprykerEngine\Zed\Kernel\Communication\AbstractCommunicationDependencyContainer;
use SprykerFeature\Zed\SearchPage\Business\SearchPageFacade;
use SprykerFeature\Zed\SearchPage\Communication\Form\PageElementForm;
use SprykerFeature\Zed\SearchPage\Communication\Grid\PageElementGrid;
use SprykerFeature\Zed\SearchPage\Persistence\SearchPageQueryContainer;
use Symfony\Component\HttpFoundation\Request;

class SearchPageDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return SearchPageFacade
     */
    public function getSearchPageFacade()
    {
        return $this->getLocator()->searchPage()->facade();
    }

    /**
     * @return SearchPageQueryContainer
     */
    public function getSearchPageQueryContainer()
    {
        return $this->getLocator()->searchPage()->queryContainer();
    }

    /**
     * @param Request $request
     *
     * @return PageElementForm
     */
    public function createPageElementForm(Request $request)
    {
        return new PageElementForm(
            $request,
            $this->getSearchPageQueryContainer()
        );
    }

    /**
     * @param Request $request
     *
     * @return PageElementGrid
     */
    public function createPageElementGrid(Request $request)
    {
        return new PageElementGrid(
            $this->getSearchPageQueryContainer()->queryPageElementGrid(),
            $request
        );
    }

}
