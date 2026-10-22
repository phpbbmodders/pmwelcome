<?php
/**
*
* @package PM Welcome
* @copyright (c) 2020 RMcGirr83
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace apwa\pmwelcome;

/**
* Extension class for custom enable/disable/purge actions
*/
class ext extends \phpbb\extension\base
{
	/**
	 * Check whether the extension can be enabled.
	 * The current phpBB and PHP version should meet or
	 * exceed the minimum version required by this extension:
	 *
	 * @return bool|array
	 * @access public
	 */
	public function is_enableable()
	{
		$enableable = $this->check_phpbb_version() && $this->check_php_version();

		if (!$enableable)
		{
			$language = $this->container->get('language');
			$language->add_lang('pmwelcome_install', 'apwa/pmwelcome');

			return $language->lang('PMWELCOME_NOT_ENABLEABLE');
		}

		return $enableable;
	}

	/**
	 * Require phpBB 3.3.19 due to several security fixes in the phpBB software.
	 *
	 * @return bool
	 */
	protected function check_phpbb_version()
	{
		return phpbb_version_compare(PHPBB_VERSION, '3.3.19', '>=');
	}

	/**
	 * Requires PHP 8.3.36 due to security fixes.
	 *
	 * @return bool
	 */
	protected function check_php_version()
	{
		return PHP_VERSION_ID >= 80336;
	}
}
