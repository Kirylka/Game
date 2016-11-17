<?php

namespace Game\Contracts;
use Game\PhysicalObject;

interface ScalesInterface {

	const FIRST_SCALEPAN_BIGGER = 1;
	const SECOND_SCALEPAN_BIGGER = 2;
	const SCALEPANS_ARE_EQUAL = 3;
	
	/**
	 * @return 1|2|3 returns 1 in case the first scalepan has bigger weight and 2 in case the second one has. 
	 * 3 in case they are equal.
	 */
	public function compareObjects();

	/**
	 * @return void
	 * @param PhysicalObject $object Add objects
	 */
	public function addToFirstScalepan(PhysicalObject $object);

	/**
	 * @return void
	 * @param PhysicalObject $object Add objects
	 */
	public function addToSecondScalepan(PhysicalObject $object);
}