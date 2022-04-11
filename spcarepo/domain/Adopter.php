<?php
/*
 * Copyright 2013 by Allen Tucker. 
 * This program is part of RMHC-Homebase, which is free software.  It comes with 
 * absolutely no warranty. You can redistribute and/or modify it under the terms 
 * of the GNU General Public License as published by the Free Software Foundation
 * (see <http://www.gnu.org/licenses/ for more information).
 * 
 */

/*
 * Created on Mar 28, 2008
 * @author Oliver Radwan <oradwan@bowdoin.edu>, Sam Roberts, Allen Tucker
 * @version 3/28/2008, revised 7/1/2015
 */
 class Adopter {
	private $first_name; // first name as a string
	private $last_name;  // last name as a string
	private $email;   // email address as a string
	private $opt_in;     // opt in to email list

	function __construct($f, $l, $e, $o) {
		$this->first_name = $f;
		$this->last_name = $l;
		$this->email = $e;
		$this->opt_in = $o
	}

	function get_first_name() {
		return $this->first_name;
	}

	function get_last_name() {
		return $this->last_name;
	}

	function get_email() {
		return $this->email;
	}

	function get_opt_in() {
		return $this->opt_in;
	}
}
?>
