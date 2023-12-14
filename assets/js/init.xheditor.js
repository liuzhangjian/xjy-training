$(document).ready(function(){
	CustomTool = "Blocktag,Fontface,FontSize,Bold,Italic,Underline,Strikethrough,FontColor,BackColor,SelectAll,Removeformat,|,Align,List,Outdent,Indent,|,Link,Unlink,Img,Table,|,Source,Preview,Fullscreen";
	$('.editor').xheditor({tools:CustomTool,skin:'nostyle'});
});