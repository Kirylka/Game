<?php
use Game\Factories\BallFactory;
use Game\Scales;

class CompareTest extends PHPUnit\Framework\TestCase
{
	public function testBallCanBeCompared()
	{
		$heavyBall = 3;

		$balls = (new BallFactory())->createBalls(9, $heavyBall);

		$firstScaleNumbers = [3];
		$secondScaleNumbers = [4];

		$scale = new Scales();

		foreach ($balls as $key => $ball) {
			if (in_array($key, $firstScaleNumbers)) {
				$scale->addToFirstScalepan($ball);
			}

			if (in_array($key, $secondScaleNumbers)) {
				$scale->addToSecondScalepan($ball);
			}

			$result = $scale->compareObjects();

			
		}
		

		$this->assertEquals(Scales::FIRST_SCALEPAN_BIGGER, $result);
	}

	public function testBallCanBeComparedExtended()
	{
		$heavyBall = 3;

		$balls = (new BallFactory())->createBalls(9, $heavyBall);

		$firstScaleNumbers = [3,5,6,7];
		$secondScaleNumbers = [4,2,1,8];

		$scale = new Scales();

		foreach ($balls as $key => $ball) {
			if (in_array($key, $firstScaleNumbers)) {
				$scale->addToFirstScalepan($ball);
			}

			if (in_array($key, $secondScaleNumbers)) {
				$scale->addToSecondScalepan($ball);
			}

			$result = $scale->compareObjects();


		}


		$this->assertEquals(Scales::FIRST_SCALEPAN_BIGGER,$result);
	}
	
}