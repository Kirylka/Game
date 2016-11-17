var GameController = (function () {

	// locally scoped Object
	var gameController = {};
	
	var privateMethod = function () {};

	gameController.firstScaleNums = [];
	gameController.secondScaleNums = [];
	gameController.ballsNumber = 9;
	gameController.trialsNumber = 3;
	
	gameController.decreaseBallsNumber = function () {
		gameController.ballsNumber--;
	};

	gameController.increaseBallsNumber = function () {
		gameController.ballsNumber--;
	};

	gameController.decreaseTrialsNumber = function () {
		gameController.trialsNumber--;
	};

	gameController.decreaseTrialsNumber = function () {
		gameController.trialsNumber--;
	};

	gameController.compare = function () {

		$.ajax({
			type: "POST",
			data: {first_scale_nums: gameController.firstScaleNums, second_scale_nums: gameController.secondScaleNums},
			url: "http://localhost:8000/index.php?action=compare",
			success: function(msg){
				alert(msg);
			}
		});

	};
	
	gameController.init = function() {
		$('#firstScalePrepare .ball').click(function () {
			var number = $(this).data('number');
			$("#firstScale").find("[data-number='" + number + "']").removeClass('invisible');
			gameController.firstScaleNums.push(number);
		});

		$('#secondScalePrepare .ball').click(function () {
			var number = $(this).data('number');
			$("#secondScale").find("[data-number='" + number + "']").removeClass('invisible');
			gameController.secondScaleNums.push(number);
		});

		$('#compare').click(function () {
			if (gameController.secondScaleNums.length && gameController.firstScaleNums.length) {
				gameController.compare();
			} else {
				alert('put smth on the scales');
			}

		});
	};
	

	return gameController;

})();