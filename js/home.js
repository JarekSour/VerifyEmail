$("document").ready(function(){
	$("button[name='btnExcel']").click(
		function(){
			var b="";
			$("tbody tr").each(function(){
				$(this);
				var a=$(this).find("td").eq(0).text();
				-1!==$(this).find("td").eq(1).html().indexOf("success")&&(b+=a+"\r\n")});
				var c=new Blob([b],{type:"text/plain"}),a=document.createElement("a");a.download="contactos.txt";a.innerHTML="";window.URL=window.URL||window.webkitURL;a.href=window.URL.createObjectURL(c);a.onclick=destroyClickedElement;a.style.display="none";document.body.appendChild(a);
a.click()})});
function destroyClickedElement(b){document.body.removeChild(b.target)}

$("document").ready(function(){
	$("button[name='btnStart']").click(function(){
		$("#myModal").addClass("in");
		var b=100/$("tbody tr").length,c=0,validos=0,invalidos=0,porval=0,porin=0;
		$("tr").each(function(){
			var a=$(this),d=$(this).find("td").html();
			void 0==d&&null==d||
			$.post("mid/verify.php",{
				mai:d
			},function(d,e){
				obj=JSON.parse(d);
				if("Invalido"==obj.Estado){
					a.find("td:nth-child(2)").html('<i class="text-danger fa fa-times-circle fa-2x"></i>');
					invalidos++;
					porval=porval+b;
					$("#numInvalidos").html(invalidos);
					$(".chart2").data('easyPieChart').update(porval);
				}else{
					a.find("td:nth-child(2)").html('<i class="text-success fa fa-check fa-2x"></i>');
					validos++;
					porin= porin +b;
					$("#numValidos").html(validos);
					$(".chart1").data('easyPieChart').update(porin);
					
				}
				
				
				a.find("td:nth-child(3)").html(obj.Mensaje);
				c+=b;$("#dvProgress").html(Math.round(c)+"%");
				100<=Math.round(c)&&($("#myModal").removeClass("in"),setTimeout(function(){$("#dvProgress").delay(3E3).html("0%")},2E3))});
				$("button[name='btnExcel']").fadeIn()
			})
	})
});

function readSingleFile(b){
	$("button[name='btnStart']").prop("disabled",!1);
	$("tbody").html("");
	
	if(b=b.target.files[0]){
		var c=new FileReader;
		c.onload=function(a){
			a=a.target.result;
			a=a.split("\n");
			
			for(var b=0;b<a.length;b++)
				0<a[b].length&&$("tbody").append("<tr><td>"+$.trim(a[b])+"</td><td></td><td></td></tr>")
				
			$("#tot").html(a.length);
		};
		c.readAsText(b)}else{var a=$("#stat").addClass("in");
				
		setTimeout(function(){a.removeClass("in")},6E3)
	}
};