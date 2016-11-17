GameRenderer = (function () {

	// locally scoped Object
	var gameRenderer = {};
	
	var privateMethod = function () {};

	gameRenderer.showBallsOnFirstScale = function (number) {
		$('#firstScale').children().each(function (counter) {
			$(this).css("visibility", "invisible");
			if (counter < number) {
				$(this).css("visibility", "visible");
			}
		});
	};

	gameRenderer.showBallsOnSecondScale = function (number) {
		$('#firstScale').children().each(function (counter) {
			$(this).css("visibility", "invisible");
			if (counter < number) {
				$(this).css("visibility", "visible");
			}
		});
	};

	gameRenderer.init = function () {

		$("#firstScalepanBall1").css({
			 	position: 'absolute',
			 	top: "360px",
			 	left: "35px"
		});

		$("#firstScalepanBall2").css({
			position: 'absolute',
			top: "400px",
			left: "35px"
		});

		$("#firstScalepanBall3").css({
			position: 'absolute',
			top: "440px",
			left: "35px"
		});

		$("#firstScalepanBall4").css({
			position: 'absolute',
			top: "480px",
			left: "35px"
		});

		$("#firstScalepanBall5").css({
			position: 'absolute',
			top: "520px",
			left: "35px"
		});

		$("#firstScalepanBall6").css({
			position: 'absolute',
			top: "560px",
			left: "35px"
		});

		$("#firstScalepanBall7").css({
			position: 'absolute',
			top: "600px",
			left: "35px"
		});

		$("#firstScalepanBall8").css({
			position: 'absolute',
			top: "640px",
			left: "35px"
		});

		$("#firstScalepanBall9").css({
			position: 'absolute',
			top: "680px",
			left: "35px"
		});

		$("#secondScalepanBall1").css({
			position: 'absolute',
			top: "360px",
			left: "1190px"
		});

		$("#secondScalepanBall2").css({
			position: 'absolute',
			top: "400px",
			left: "1190px"
		});

		$("#secondScalepanBall3").css({
			position: 'absolute',
			top: "440px",
			left: "1190px"
		});

		$("#secondScalepanBall4").css({
			position: 'absolute',
			top: "480px",
			left: "1190px"
		});

		$("#secondScalepanBall5").css({
			position: 'absolute',
			top: "520px",
			left: "1190px"
		});

		$("#secondScalepanBall6").css({
			position: 'absolute',
			top: "560px",
			left: "1190px"
		});

		$("#secondScalepanBall7").css({
			position: 'absolute',
			top: "600px",
			left: "1190px"
		});

		$("#secondScalepanBall8").css({
			position: 'absolute',
			top: "640px",
			left: "1190px"
		});

		$("#secondScalepanBall9").css({
			position: 'absolute',
			top: "680px",
			left: "1190px"
		});


	};

	return gameRenderer;

})();