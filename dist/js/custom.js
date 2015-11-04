

function init(){
	document.addEventListener("DOMContentLoaded",send_url);
	

}



$(document).ready(function(){
  $.material.init();
});


function send_url(){
	
	$(document).ready(function(){
		chrome.tabs.getSelected(null,function(tab){
			var masterlink = tab.url;
			var pageurl = document.getElementById("pageurl");
			pageurl.value = masterlink;
		});


	});
    

}
document.getElementById("source").addEventListener("change",function(){

	var checkboxes=document.getElementsByName('foo');
	var i;
	var source=document.getElementById("source");
	if(source.checked==true)
	{
		for(i=0;i<checkboxes.length;i++)
	{
		if(checkboxes[i].type=="checkbox")
		{
			checkboxes[i].checked=true;

		}
	}
	}
	else if(source.checked==false)
	{
		for(i=0;i<checkboxes.length;i++)
	{
		if(checkboxes[i].type=="checkbox")
		{
			checkboxes[i].checked=false;

		}
	}
	}
	

});

init();

