<?php
namespace Game;

use Game\Contracts\ScalesInterface;

/**
 * This is the class for Scales.
 *
 * @property PhysicalObject[] $firstScalepanObjects
 * @property PhysicalObject[] $secondScalepanObjects
 *
 */
class Scales implements ScalesInterface
{


	public $firstScalepanObjects = [];
	public $secondScalepanObjects = [];

	/**
	 * @inheritdoc
	 */
	public function compareObjects()
	{

		$firstScalepanObjectsWeight = 0;
		$secondScalepanObjectsWeight = 0;

		if (count($this->firstScalepanObjects)) {
			foreach ($this->firstScalepanObjects as $firstScalepanObject) {
				$firstScalepanObjectsWeight += (int)$firstScalepanObject->getWeight();
			}
		}

		if (count($this->secondScalepanObjects)) {
			foreach ($this->secondScalepanObjects as $secondScalepanObject) {
				$secondScalepanObjectsWeight += (int)$secondScalepanObject->getWeight();
			}
		}

		if ($firstScalepanObjectsWeight === $secondScalepanObjectsWeight) {
			return self::SCALEPANS_ARE_EQUAL;
		} else {
			if ($firstScalepanObjectsWeight > $secondScalepanObjectsWeight) {
				return self::FIRST_SCALEPAN_BIGGER;
			} else {
				return self::SECOND_SCALEPAN_BIGGER;
			}
		}

	}

	/**
	 * @inheritdoc
	 */
	public function addToFirstScalepan(PhysicalObject $object)
	{
		$this->firstScalepanObjects[] = $object;
	}

	/**
	 * @inheritdoc
	 */
	public function addToSecondScalepan(PhysicalObject $object)
	{
		$this->secondScalepanObjects[] = $object;
	}


}