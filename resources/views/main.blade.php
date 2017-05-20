<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    .content{
        width:900px;
        margin:0 auto;
    }
    #searchid
    {
        width:500px;
        border:solid 1px #000;
        padding:10px;
        font-size:14px;
    }
    #but{
      margin-left: 150px;
    }
    #result
    {
        position:absolute;
        width:500px;
        padding:10px;
        display:none;
        margin-top:-1px;
        border-top:0px;
        overflow:hidden;
        border:1px #CCC solid;
        background-color: white;
    }
    .show
    {
        padding:10px; 
        border-bottom:1px #999 dashed;
        font-size:15px; 
        height:15px;
        width: 300px;
    }
    .show:hover
    {
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }
   </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>main</title>

  <script type="text/javascript">


  var uu;
  function set_value(st){
  	uu = st;

  }
  function addButtonClick(e, name){
    var target = e.target || e.srcElement;
    //console.log($(e.target).attr('class'));
    var cl=$(e.target).attr('class');
    var node = document.createElement("LI");         
    var textnode = document.createTextNode(cl);         
    node.appendChild(textnode); 
    document.getElementById("myList").appendChild(node); 
    $("#livesearch").html("");
    

    var data = { "first_user":"", "sec_user":"" };
    data.first_user= uu;


    data.sec_user=cl;
    console.log("trtr");
    console.log(data);


    if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
    } else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
    	var x= this.responseText;
    	console.log(x);
      document.getElementById("livesearch").innerHTML=this.responseText;
    }
  }
  var dat1=JSON.stringify(data);

  console.log(data);
  xmlhttp.open("get","loginme3/"+dat1,true);
  xmlhttp.send();



/*
     $.ajax({
          url: "loginme3",
          cache: false,
          type:  "POST",
          data:  JSON.stringify(data),
          success: function(html){
            console.log("ajax done");
          },
    	  failure: function (errMsg) {
        	console.log("err msg");
    	  }
        });

*/

  }

  </script>
<script>

function showResult(str , us) {


set_value(us);
console.log(us);
	var data = {"username":"", "str":""};
	data.username=us;
	data.str=str;
	

  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
  //    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  var str2=JSON.stringify(data);
  xmlhttp.open("GET","loginme2/"+str2,true);
  xmlhttp.send();
}
</script>
</head>
<body>
	<div>
	<?php
	$temp_id='';
	foreach ($login as $u) {
        $temp_id = $u;
    }

	?>

	Search any person with email id<br>
		<form>
			<input type="text" size="30" onkeyup="showResult(this.value , '<?php echo $temp_id; ?>')">
			<div id="livesearch" class "dropdown">
			</div>
		</form>
		<br>

		

	</div>
	<div id="followers_list">
<br><br><br><br><br>
	Followers <br>

  <ul id="myList">
	<?php 
	foreach ($users as $user) {
        echo "<li>" . $user . "</li>";
        ?>
        <br>
        <?php
    }
	 ?>
</ul>		
	</div>
</body>
</html>