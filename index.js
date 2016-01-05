$(document).ready(function() {

	$("#submitform").submit(function(event) {
		event.preventDefault();

		var postData = {};
		var questionCount = parseInt($("#questioncount").val());
		postData["isinternal"] = "true";
		for (var i = 0; i < questionCount; i++) {
			var answerId = "#ans" + i.toString();
			postData[answerId] = $(answerId).val();
		}
		$.post("validate_answers.php", {postData}, function(data) {
			if (data != "success") {
				$("#msgplaceholder").text("Vă rugăm să alegeți un număr pentru toate afirmațiile.");
				$("#msgplaceholder").css("color", "red");
				$("#msgplaceholder").css("font-weight", "bold");
			} else {
				// Creating phony form to redirect with post data
				var url = "testcomplet.php";
				var postdata = "test";
				var formInputs = "";
				for (i = 0; i < questionCount; i++) {
					var answerId = "#ans" + i.toString();
					formInputs = formInputs + '<input type="text" name="' + answerId + '" id="' + answerId +
						'" value="' + $(answerId).val() + '">';
				}
				var form = $('<form action="' + url + '" method="post">' + formInputs + '</form>');
				$("body").append(form);
				form.submit();
			}
		});
	});

	$("select").change(function() {
		$("#msgplaceholder").text("");
	});

});
