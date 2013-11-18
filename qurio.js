$( document ).ready(
	function(){
		$(".white-btn").on("click",function(event)
			{

				var $newElement = $("<form style='color: #B7C7CC;'> Session Number: <input class='session-input' type='text' name='session-number'><br></form>");
				var $newButton = $("<button> join session </button>");
				var $temp = $(".simple-btn").eq(0);
				$(".white-btn p").remove();
				$newElement.appendTo($(".white-btn"));
				$newButton.appendTo($(".white-btn"));
				//$(".white-btn").eq(0).hide();
				$(".white-btn").off("click");
			})
	}
)