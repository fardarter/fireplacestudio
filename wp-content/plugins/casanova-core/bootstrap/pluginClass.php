<?php

class ffPluginCasanovaShortcodes extends ffPluginAbstract {
	/**
	 *
	 * @var ffPluginCasanovaShortcodesContainer
	 */
	protected $_container = null;

	protected function _registerAssets() {

	}

	protected function _run() {
		$shortcodeManager = $this->_getContainer()->getFrameworkContainer()->getShortcodesNamespaceFactory()->getShortcodeManager();
		$shortcodeManager->addShortcodeClassName('ffShortcodeDropcap');
		$shortcodeManager->addShortcodeClassName('ffShortcodeHeaderUnderlined');
		$shortcodeManager->addShortcodeClassName('ffShortcodeMark');

		require dirname( dirname( __FILE__ ) ).'/components/vc_shortcodes/vc_casanova_shortcodes.php';

		$fwc = ffContainer::getInstance();
		$fwc->getWPLayer()->add_action( 'casanova_theme_initialized', array( $this, 'registerPostTypes' ), 10, 2 );
	}

	public function registerPostTypes(){
		if( ! class_exists('ffThemeOptions') ){
			return;
		}

		$fwc = ffContainer::getInstance();

		// Portfolio - Custom Post Type
		$ptPortfolio = $fwc->getPostTypeRegistratorManager()
			->addPostTypeRegistrator('portfolio', 'Portfolio');

		$ptPortfolio->getSupports()
			->set('editor', true)
			->set('excerpt', false);

		// var_dump(ffThemeOptions::getQuery('portfolio portfolio_slug' ));exit;
		$ptPortfolio->getArgs()->set('rewrite', array( 'slug' => ffThemeOptions::getQuery('portfolio portfolio_slug' )));

		// Portfolio Tag - Custom Taxonomy
		$taxPortfolioTag = $fwc->getCustomTaxonomyManager()
			->addCustomTaxonomy('ff-portfolio-tag', 'Portfolio Tag');
		$taxPortfolioTag->connectToPostType( 'portfolio' );

		$taxPortfolioTag->getArgs()->set('rewrite', array( 'slug' => ffThemeOptions::getQuery('portfolio portfolio_tag_slug' )));

		// Portfolio Category - Custom Taxonomy
		$taxPortfolioCategory = $fwc->getCustomTaxonomyManager()
			->addCustomTaxonomy('ff-portfolio-category', 'Portfolio Category');
		$taxPortfolioCategory->setCategoryBehaviour();
		$taxPortfolioCategory->connectToPostType('portfolio');

		$taxPortfolioCategory->getArgs()->set('rewrite', array( 'slug' => ffThemeOptions::getQuery('portfolio portfolio_category_slug' )));

	}

	protected function _registerActions() {

	}

	protected function _setDependencies() {

	}


	/**
	 * @return ffPluginFreshFaviconContainer
	 */
	protected function _getContainer() {
		return $this->_container;
	}
}