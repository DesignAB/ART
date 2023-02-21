<?php


class Pet extends Person{
	public function owner() {
		$a = $this->first;
		return $a;

	}
}

