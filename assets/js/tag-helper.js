function testKey(event)
{
	valueOfKey = String.fromCharCode(event.keyCode);

	if(valueOfKey.match(/^['"!#$%&/()=?¡¿*¨¬@°<>|´+-_:;,^~`\[\]\{\}]/))
	{
		return false;
	}
	else
		return true;
}

function addTag(event)
{
	if(testKey(event)==false)
	{
		console.log('tecla no permitida');
		event.preventDefault();
	}
	else
		console.log(event.keyCode);
		if(event.keyCode == 13)
		{

			var newTag = document.getElementById("hashtag-textfield").value;
			alert('tag: '+newTag);
			if(newTag.length > 30)
			{
				alert('menos de 30 carácteres');
			}
			else
			{
				//document.getElementById("tag-alert").style.visibility="hidden";

				var initTag = newTag;
				var newTag = "<div class=\"tag\">" + newTag + "</div>";

				alert(newTag);

				var hashtagFormContent = document.getElementById("new-post-hashtag-div").innerHTML;

				var index = hashtagFormContent.indexOf("<div class='new-tag'>");
				var start = hashtagFormContent.substring(0,index);
				var end = hashtagFormContent.substring(index);

				var composition = start + newTag + end;

				alert(composition);
				document.getElementById("new-post-hashtag-div").innerHTML = composition;
				document.getElementById("hashtag-textfield").focus();

				var counter;
				for (counter=1; counter <= 30; counter++)
				{
					if (document.getElementById("tag"+counter).value == "")
					{
						document.getElementById("tag"+counter).value = initTag;
						break;
					}

				}
				document.getElementById('save-tags-button').className = "save-button-enabled";
				console.log(document.getElementById('save-tags-button').className);

			}
		}
}
