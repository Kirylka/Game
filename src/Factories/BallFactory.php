<?php

namespace Game\Factories;
use Game\Ball;

class BallFactory
{
	public function createBalls($number, $numberOfBigger)
	{
		$balls = [];
		$normalWeight = 10;
		$biggerWeight = 11;
		
		for ($i = 0; $i <= $number; $i++)
		{
			if ($i == $numberOfBigger) {
				$balls[] = new Ball($biggerWeight);
			} else {
				$balls[] = new Ball($normalWeight);
			}
			
		}

		return $balls;
	}
}