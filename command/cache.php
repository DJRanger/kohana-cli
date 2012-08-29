<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Command_Cache class a simple command to clear cache
 *
 * @package    Despark/timestamped-migrations
 * @author     Ivan Kerin
 * @copyright  (c) 2011-2012 Despark Ltd.
 * @license    http://creativecommons.org/licenses/by-sa/3.0/legalcode
 **/
class Command_Cache extends Command
{

	const CLEAR_BRIEF = "Clear system cache and Cache";
	public function clear(Command_Options $options)
	{
		self::log_func(array(Cache::instance(), 'delete_all'), null, Command::OK);
		self::log_func(array(Cache::instance('memcache'), 'delete_all'), null, Command::OK);
		self::log_func("system", array("rm -rf ".Kohana::$cache_dir."/*"), Command::OK);
	}
}
