<?php
use Game\Repositories\GameRepository;

class BasicTest extends PHPUnit\Framework\TestCase
{
	public function testGameCanBeCreated()
	{
		$repository = new GameRepository();
		
		$gameId = $repository->createGame(['heavy_ball' => rand(0,9)]);
		$this->assertNotFalse($gameId);
	}

	public function testStepCanBeCreated()
	{
		$repository = new GameRepository();

		$gameId = $repository->createGame(['heavy_ball' => rand(0,9)]);
		
		$step = $repository->createStep(['first_scale'  => json_encode([1,2]),
		                                 'second_scale' => json_encode([3,4]),
		                                 'game_id'      => $gameId]);
		
		$this->assertNotFalse($step);
	}
	
}