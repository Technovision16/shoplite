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