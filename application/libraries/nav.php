<?php
/**
 * Nav
 *
 * A library to help with generating navigation elements
 *
 * @license     http://www.opensource.org/licenses/mit MIT License
 * @copyright   UserScape, Inc. (http://userscape.com)
 * @author      UserScape Dev Team
 * @link        http://bundles.laravel.com
 * @package     Laravel-Bundles
 * @subpackage  Libraries
 * @filesource
 */
class Nav {

	/**
	 * All Cats
	 *
	 * Array of all categories. Used to limit queries
	 *
	 * @param array
	 */
	protected static $all = array();

	/**
	 * Active Nav
	 *
	 * Determine if the current link should be active.
	 *
	 * @param string $route
	 * @return string
	 */
	public static function active($route = '')
	{
		return (URI::is($route)) ? 'active' : '';
	}

	/**
	 * Active Cat Nav
	 *
	 * Determine if the current category should be active.
	 *
	 * @param string $route
	 * @return string
	 */
	public static function cat($route = '')
	{
		return (URI::current() == $route) ? 'active' : '';
	}

	/**
	 * Cat count
	 *
	 * Get the total number of listings in a category.
	 *
	 * @param int $cat
	 * @return int
	 */
	public static function cat_count($cat = null)
	{
		if ($cat === null)
		{
			return Listing::where_active('y')->count();
		}

		if (empty(static::$all))
		{
			static::$all = Listing::where_active('y')->get();
		}

		$count = 0;

		foreach (static::$all as $item)
		{
			if ($item->category_id == $cat)
			{
				$count++;
			}
		}

		return $count;
	}

	/**
	 * Get pages
	 *
	 * Get a list of pages for the nav.
	 */
	public static function pages($depth = 0)
	{
		return Page::where_parent($depth)->where_nav('y')->get();
	}
}