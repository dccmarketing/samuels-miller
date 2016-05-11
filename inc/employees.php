<?php

/**
 * Class that tweaks the Employee plugin
 */

class Samuels_Miller_Employees {

	public function __construct() {

		$this->loader();

	} // __construct()

	public function loader () {

		$templates = Employees_Template_Functions::this();

		remove_action( 'employees-loop-content', array( $templates, 'loop_content_name' ), 15 );
		add_action( 'employees-loop-content', array( $this, 'loop_content_name' ), 15 );

	} // loader()

	/**
	 * Includes the employee name in a paragraph tag
	 *
	 * @hooked 		employees-loop-content 		15
	 *
	 * @param 		object 		$item 		An employee post object
	 * @param 		array 		$meta 		The post metadata
	 */
	public function loop_content_name( $item, $meta = array() ) {

		if ( empty( $item ) ) { return; }

		?><p class="employee-list-name" itemprop="name"><?php echo $item->post_title; ?></p><?php

	} // loop_content_name()

} // class

$samuels_miller_employees = new Samuels_Miller_Employees();