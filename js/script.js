var count=0;
function add_product() {
	count=count+1;
	document.getElementById('add_btn')
	    .insertAdjacentHTML('beforebegin' ,'<div class="card"><div class="product"><input type="text"  onkeyup="showPrice(this.value);" placeholder="Enter Product Code"></div><div class="remove"><a href="#"><span><i class="ion ion-close-round"></i></span></a></div><div class="pname"></div><div class="price" id="pr"></div></div>'
	    	);
	document.getElementsByClassName('card')[count].setAttribute('id',"card"+parseInt(count+1));
	document.getElementsByTagName('input')[count].setAttribute('name',count+1);
	console.log(document.getElementsByTagName('input')[count-1].attributes);
	console.log(document.getElementsByClassName('card')[count-1].attributes);
	document.getElementsByClassName('price')[count].setAttribute('id',"pr"+(count+1));
    //console.log(count);
}
function send_count() {
	var a=document.getElementById('counter').value=count;
	console.log(a);
}

// Ajax   
var totprice =0;

function showPrice(str) {
     if (str.length == 0) {
         document.getElementById("pr").innerHTML = "";
         return;
     } else {
        if(count>0)
            st="pr"+(count+1);
        else
            st="pr1";
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 document.getElementById(st).innerHTML = xmlhttp.responseText;
                 // console.log("1"+totprice);
                 if(xmlhttp.responseText>0)
                 totprice+=parseInt(xmlhttp.responseText);
                document.getElementById("tot").innerHTML="Rs."+totprice;
             }
         }
         xmlhttp.open("GET", "getprice.php?q="+str, true);
         xmlhttp.send();
     }
}
function showModal() {
    document.getElementById('myModal').style.height="100%";
}