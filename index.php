<?php
use Game\Factories\BallFactory;
use Game\Repositories\GameRepository;
use Game\Scales;

require __DIR__ . '/vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


$routes = ['compare','guess'];
if (isset($_GET["action"]) && in_array($_GET["action"], $routes)) {
	switch ($_GET["action"]) {
		case "compare":

			$gameNumber = isset($_POST['game_number']) ? $_POST['game_number'] : null;
			$firstScaleNumbers = $_POST['first_scale_nums'];
			$secondScaleNumbers = $_POST['second_scale_nums'];

			$repository = new GameRepository();
			$scale = new Scales();

			if (!$gameNumber) {
				$heavyBall = rand(1, 9);
				$gameNumber = $repository->createGame(['heavy_ball' => $heavyBall]);
			} else {
				$heavyBall = $repository->getHeavyBallByGame($gameNumber);
			}

			$balls = (new BallFactory())->createBalls(9, $heavyBall);

			$repository->createStep(['first_scale'  => json_encode($firstScaleNumbers),
			                       'second_scale' => json_encode($secondScaleNumbers),
			                       'game_id'      => $gameNumber]);


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
							$res = ['res' => 'First scalepan is heavier'];
							break;
						case Scales::SECOND_SCALEPAN_BIGGER:
							$res = ['res' => 'Second scalepan is heavier'];
							break;
						case Scales::SCALEPANS_ARE_EQUAL:
							$res = ['res' => 'Scalepans are equal'];
							break;
						default:
							break;
					}
				}
			}
			break;

		case "guess":
			$gameNumber = isset($_POST['game_number']) ? $_POST['game_number'] : null;
			$guess = isset($_POST['guess']) ? $_POST['guess'] : null;

			$heavyBall = (new GameRepository())->getHeavyBallByGame($gameNumber);

			if ($heavyBall == $guess) {
				$res = ['res' => 'You won!'];
			} else {
				$res = ['res' => 'You lost!'];
			}
		break;

	}

	$res['game_number'] = $gameNumber;
	//return JSON array
	exit(json_encode($res));
}

