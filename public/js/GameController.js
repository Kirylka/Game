var GameController = (function () {

	// locally scoped Object
	var gameController = {};

	var privateMethod = function () {
	};

	gameController.firstScaleNums = [];
	gameController.secondScaleNums = [];
	gameController.trialsNumber = 2;
	gameController.gameNumber = null;

	gameController.decreaseTrialsNumber = function () {
		gameController.trialsNumber--;
	};

	gameController.compare = function () {

		if (!gameController.trialsNumber) {
			alert('Your trials number is over');
			return;
		}

		$.ajax({
			type: "POST",
			data: {
				game_number: gameController.gameNumber,
				first_scale_nums: gameController.firstScaleNums,
				second_scale_nums: gameController.secondScaleNums
			},
			url: "http://localhost:8000/index.php?action=compare",
			success: function (msg) {
				msg = JSON.parse(msg);
				gameController.gameNumber = msg.game_number;
				alert(msg['res']);
				gameController.decreaseTrialsNumber();
				GameRenderer.updateTrialsNumber();
				gameController.firstScaleNums = [];
				gameController.secondScaleNums = [];
			}
		});

	};

	gameController.init = function () {
		$('#firstScalePrepare .ball').click(function () {
			var number = $(this).data('number');
			$(this).addClass('invisible');
			$("#firstScalePrepare").find("[data-number='" + number + "']").addClass('invisible');
			$("#secondScalePrepare").find("[data-number='" + number + "']").addClass('invisible');
			$("#firstScale").find("[data-number='" + number + "']").removeClass('invisible');
			gameController.firstScaleNums.push(number);
		});

		$('#secondScalePrepare .ball').click(function () {
			var number = $(this).data('number');
			$(this).addClass('invisible');
			$("#firstScalePrepare").find("[data-number='" + number + "']").addClass('invisible');
			$("#secondScalePrepare").find("[data-number='" + number + "']").addClass('invisible');
			$("#secondScale").find("[data-number='" + number + "']").removeClass('invisible');
			gameController.secondScaleNums.push(number);
		});

		$('#compare').click(function () {
			if (gameController.secondScaleNums.length && gameController.firstScaleNums.length) {
				gameController.compare();
				GameRenderer.showBallsOnFirstScale();
				GameRenderer.showBallsOnSecondScale();
			} else {
				alert('put smth on the scales');
			}

		});

		$('#checkGuess').click(function(e) {
			e.preventDefault();

			var guess = $('#ballNumberGuess').val();
			if (!gameController.gameNumber || !guess) {
				alert('Make your first comparison and put the number of the ball that is heavier');
				return;
			}

			$.ajax({
				type: "POST",
				data: {
					game_number: gameController.gameNumber,
					first_scale_nums: gameController.firstScaleNums,
					second_scale_nums: gameController.secondScaleNums
				},
				url: "http://localhost:8000/index.php?action=guess",
				success: function (msg) {
					msg = JSON.parse(msg);
					alert(msg['res']);
					gameController.gameNumber = null;
					gameController.trialsNumber = 2;
					gameController.firstScaleNums = [];
					gameController.secondScaleNums = [];

					$('#ballNumberGuess').val("");
					GameRenderer.updateTrialsNumber();
					GameRenderer.showBallsOnFirstScale();
					GameRenderer.showBallsOnSecondScale();
				}
			});
		});
	};


	return gameController;

})();