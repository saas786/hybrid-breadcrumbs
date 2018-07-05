<?php
/**
 * Crumb class.
 *
 * This is the base class, which should be sub-classed, for creating a specific
 * breadcrumb item. Each sub-class should, at minimum, have a label. Not all
 * will necessarily have a URL if they're only designed to be the final crumb in
 * the trail.
 *
 * @package   HybridBreadcrumbs
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-breadcrumbs
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Breadcrumbs\Crumb;

use Hybrid\Breadcrumbs\Contracts\Breadcrumbs;
use Hybrid\Breadcrumbs\Contracts\Builder;
use Hybrid\Breadcrumbs\Contracts\Crumb as CrumbContract;

/**
 * Base crumb class.
 *
 * @since  1.0.0
 * @access public
 */
class Crumb implements CrumbContract {

	/**
	 * Builder object.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    Builder
	 */
	protected $builder;

	/**
	 * Breadcrumbs object.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    Breadcrumbs
	 */
	protected $manager;

	/**
	 * Creates a new crumb object. Any data passed in within the `$data`
	 * array will be automatically assigned to any existing properties, which
	 * can be useful for sub-classes that have custom properties.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  Builder     $builder
	 * @param  Breadcrumbs $manager
	 * @param  array       $data
	 * @return void
	 */
	public function __construct( Builder $builder, Breadcrumbs $manager, array $data = [] ) {

		foreach ( array_keys( get_object_vars( $this ) ) as $key ) {

			if ( isset( $data[ $key ] ) ) {
				$this->$key = $data[ $key ];
			}
		}

		$this->builder = $builder;
		$this->manager = $manager;
	}

	/**
	 * Returns a label for the crumb.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function label() {
		return '';
	}

	/**
	 * Returns a URL for the crumb.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function url() {
		return '';
	}
}
