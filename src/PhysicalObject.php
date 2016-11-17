<?php
namespace Game;
abstract class PhysicalObject
{
	private $weight;


	public function __construct($weight)
	{
		$this->weight = $weight;
	}

	/**
	 * @return mixed
	 */
	public function getWeight()
	{
		return $this->weight;
	}

	/**
	 * @param mixed $weight
	 */
	public function setWeight($weight)
	{
		$this->weight = $weight;
	}
}