<?php
/**
 * FirePHP Toolbar Helper
 *
 * Injects the toolbar elements into non-HTML layouts via FireCake.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       debug_kit
 * @subpackage    debug_kit.views.helpers
 * @since         DebugKit 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 **/
App::import('helper', 'DebugKit.Toolbar');
App::import('Vendor', 'DebugKit.FireCake');

class FirePhpToolbarHelper extends ToolbarHelper {
/**
 * send method
 *
 * @return void
 * @access protected
 */
	function _send() {
		$view =& ClassRegistry::getObject('view');
		$view->element('debug_toolbar', array('plugin' => 'debug_kit', 'disableTimer' => true));
		Configure::write('debug', 1);
	}
/**
 * makeNeatArray.
 *
 * wraps FireCake::dump() allowing panel elements to continue functioning
 *
 * @param string $values 
 * @return void
 */	
	function makeNeatArray($values) {
		FireCake::info($values);
	}
/**
 * Create a simple message
 *
 * @param string $label Label of message
 * @param string $message Message content
 * @return void
 */
	function message($label, $message) {
		FireCake::log($message, $label);
	}
/**
 * Generate a table with FireCake
 *
 * @param array $rows Rows to print
 * @param array $headers Headers for table
 * @param array $options Additional options and params
 * @return void
 */
	function table($rows, $headers, $options = array()) {
		$title = $headers[0];
		if (isset($options['title'])) {
			$title = $options['title'];
		}
		array_unshift($rows, $headers);
		FireCake::table($title, $rows);
	}
}
?>