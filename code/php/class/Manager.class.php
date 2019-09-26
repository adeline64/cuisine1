<?php


class Manager {

	protected $db;
	protected $mode;

	public function __construct($mode='prod') {
		$this->mode=$mode;
	}

	public function setDb($db) {
		$this->db = $db;
	}

	public function add($data) {


	}

	public function read($id) {

	}

	public function update($data) {

	}

	public function delete($id) {

	}
}