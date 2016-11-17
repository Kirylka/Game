<?php
use Game\Factories\BallFactory;
use Game\Scales;

require __DIR__ . '/vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


$routes = ['compare'];
if (isset($_GET["action"]) && in_array($_GET["action"], $routes))
{
	switch ($_GET["action"])
	{
		case "compare":

			$firstScaleNumbers = $_POST['first_scale_nums'];
			$secondScaleNumbers = $_POST['second_scale_nums'];

			$balls = (new BallFactory())->createBalls(9, rand(1,9));

			$scale = new Scales();

			foreach ($balls as $key => $ball) {
				if (in_array($key, $firstScaleNumbers)) {
					$scale->addToFirstScalepan($ball);
				}

				if (in_array($key, $secondScaleNumbers)) {
					$scale->addToSecondScalepan($ball);
				}

				$result = $scale->compareObjects();

				if ($result) {
					switch ($result) {
						case Scales::FIRST_SCALEPAN_BIGGER:
							$res = 'First scalepan is heavier';
							break;
						case Scales::SECOND_SCALEPAN_BIGGER:
							$res = 'Second scalepan is heavier';
							break;
						case Scales::SCALEPANS_ARE_EQUAL:
							$res = 'Scalepans are equal';
							break;
						default:
							break;
					}
				}
			}
			break;
	}


	//return JSON array
	exit(json_encode($res));
}

