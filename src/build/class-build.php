<?php
/**
 * Build class.
 *
 * This is the base class, which should be sub-classed, for creating a specific
 * breadcrumb build tools. Build classes are essentially tools/methods for
 * handling specific scenarios. Quite often, they are the workhorses of the
 * project and create many of the crumbs.
 *
 * @package   HybridBreadcrumbs
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-breadcrumbs
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Breadcrumbs\Build;

use Hybrid\Breadcrumbs\Contracts\Breadcrumbs;
use Hybrid\Breadcrumbs\Contracts\Builder;
use Hybrid\Breadcrumbs\Contracts\Build as BuildContract;

/**
 * Base build class.
 *
 * @since  1.0.0
 * @access public
 */
class Build implements BuildContract {

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
	 * Creates a new build object. Any data passed in within the `$data`
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
	 * This should be overwritten in a sub-class. It's where the work happens
	 * to build out breadcrumbs.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function make() {}
}
