<?php
namespace Game\Repositories;


class GameRepository extends Repository
{

	protected $gamesTable = 'games';
	protected $stepsTable = 'steps';


	/**
	 * Creates a game.
	 *
	 * @param  array $params
	 * @return boolean
	 */
	public function createGame(array $params)
	{

		$stmt = $this->db->prepare("INSERT IGNORE INTO " . $this->gamesTable . "(heavy_ball) VALUES(:heavy_ball)");
		$stmt->execute(array(':heavy_ball' => $params['heavy_ball']));

		return $this->db->lastInsertId();

	}

	/**
	 * Creates a step.
	 *
	 * @param  array $params
	 * @return boolean
	 */
	public function createStep(array $params)
	{

		$stmt = $this->db->prepare("INSERT IGNORE INTO " . $this->stepsTable . "(first_scale,second_scale,game_id) VALUES(:first_scale,:second_scale,:game_id)");
		$stmt->execute(array(':first_scale' => $params['first_scale'], ':second_scale' => $params['second_scale'], ':game_id' => $params['game_id']));

		return $this->db->lastInsertId();

	}

	public function getHeavyBallByGame($gameId)
	{
		$stmt = $this->db->prepare("SELECT * FROM " . $this->gamesTable . " WHERE id = :id");

		$stmt->bindValue(':id', $gameId, \PDO::PARAM_INT);

		$stmt->execute();
		$result = $stmt->fetch();

		if ($result) {
			return $result['heavy_ball'];
		}

		return false;
	}


}