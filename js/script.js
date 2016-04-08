var count=0;
function add_product() {
	count=count+1;
	document.getElementById('add_btn')
	    .insertAdjacentHTML('beforebegin' ,'<div class="card"><div class="product"><input type="text" placeholder="Enter Product Code"></div><div class="pname"></div><div class="price"></div><div class="remove"><a href="#"><span><i class="ion ion-close-round"></i></span></a></div></div>'
	    	);
	document.getElementsByClassName('card')[count].setAttribute('id',"card"+parseInt(count+1));
	document.getElementsByTagName('input')[count].setAttribute('name',count+1);
	console.log(document.getElementsByTagName('input')[count-1].attributes);
	console.log(document.getElementsByClassName('card')[count-1].attributes);
	// console.log(count);
}
function send_count() {
	var a=document.getElementById('counter').value=count;
	console.log(a);
}

// Ajax   

function showPrice(str) {
     if (str.length == 0) {
         document.getElementById("txtHint").innerHTML = "";
         return;
     } else {
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 document.getElementById("pr").innerHTML = xmlhttp.responseText;
             }
         }
         xmlhttp.open("GET", "getprice.php?q="+str, true);
         xmlhttp.send();
     }
}