<?php
/**
 * Page controller
 *
 * Responsible for building the page details.
 *
 * @license     http://www.opensource.org/licenses/mit MIT License
 * @copyright   UserScape, Inc. (http://userscape.com)
 * @author      UserScape Dev Team
 * @link        http://bundles.laravel.com
 * @package     Laravel-Bundles
 * @subpackage  Controllers
 * @filesource
 */
class Page_Controller extends Controller {

	/**
	 * @todo finish this.
	 */
	public function action_detail($uri = '')
	{
		$page = Page::where_uri($uri)->first();

		return View::make('layouts.default')
			->nest('content', 'page.details', array(
				'page' => $page,
			));
	}
}