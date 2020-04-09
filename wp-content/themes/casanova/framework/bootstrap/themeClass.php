<?php

class ffTheme extends ffThemeAbstract {


	protected function _setDependencies() {

	}

	protected function _registerAssets() {
		$fwc = $this->_getContainer()->getFrameworkContainer();
		$fwc->getAdminScreenManager()->addAdminScreenClassName('ffAdminScreenThemeOptions');
		$fwc->getMetaBoxes()->getMetaBoxManager()->addMetaBoxClassName('ffMetaBoxPortfolioTitle');
		$fwc->getMetaBoxes()->getMetaBoxManager()->addMetaBoxClassName('ffMetaBoxPortfolio');
		$fwc->getMetaBoxes()->getMetaBoxManager()->addMetaBoxClassName('ffMetaBoxPortfolioSingle');
		$fwc->getMetaBoxes()->getMetaBoxManager()->addMetaBoxClassName('ffMetaBoxOnePage');
//		$fwc->getMetaBoxes()->getMetaBoxManager()->addMetaBoxClassName('ffMetaBoxLayout');
		$fwc->getMetaBoxes()->getMetaBoxManager()->addMetaBoxClassName('ffMetaBoxPostSingle');
//		$fwc->getMetaBoxes()->getMetaBoxManager()->addMetaBoxClassName('ffMetaBoxLayoutConditions');
//		$fwc->getMetaBoxes()->getMetaBoxManager()->addMetaBoxClassName('ffMetaBoxLayoutPlacement');

        $fwc->getWidgetManager()->addWidgetClassName('ffWidgetTwitter');
	}

	protected function _run() {
	}

	protected function _ajax() {

	}
}