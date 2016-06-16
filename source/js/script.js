// JavaScript Document
window.onload=function()
{
	var oTab=document.getElementById("main_song_table");
	var aH3=oTab.getElementsByTagName("h3");/*找到标题的h3*/
	var aDiv=oTab.getElementsByTagName("div");/*找到内容的div*/
	
	for(var i=0;i<aH3.length;i++)/*for 循环遍历*/
	{
		aH3[i].index=i;
		aH3[i].onclick=function()
		{
			for(var i=0; i<aH3.length;i++)
			{
				aH3[i].className="";
				aDiv[i].style.display="none";
			}
			this.className="active";
			aDiv[this.index].style.display="block";
		}
	}
}