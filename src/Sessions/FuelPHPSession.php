<?php namespace Cartalyst\Sentinel\Sessions;
/**
 * Part of the Sentinel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Cartalyst PSL License.
 *
 * This source file is subject to the Cartalyst PSL License that is
 * bundled with this package in the license.txt file.
 *
 * @package    Sentinel
 * @version    1.0.0
 * @author     Cartalyst LLC
 * @license    Cartalyst PSL
 * @copyright  (c) 2011-2014, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use Fuel\Core\Session_Driver as Session;

class FuelPHPSession implements SessionInterface {

	/**
	 * The FuelPHP session driver.
	 *
	 * @param  Fuel\Core\Session_Driver
	 */
	protected $store;

	/**
	 * Session key.
	 *
	 * @var string
	 */
	protected $key = 'cartalyst_sentinel';

	/**
	 * Create a new FuelPHP Session driver.
	 *
	 * @param  \Fuel\Core\Session_Driver  $store
	 * @param  string  $key
	 */
	public function __construct(Session $store, $key = null)
	{
		$this->store = $store;

		if (isset($key))
		{
			$this->key = $key;
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function put($value)
	{
		$this->store->set($this->key, $value);
	}

	/**
	 * {@inheritDoc}
	 */
	public function get()
	{
		return $this->store->get($this->key);
	}

	/**
	 * {@inheritDoc}
	 */
	public function forget()
	{
		$this->store->delete($this->key);
	}

}