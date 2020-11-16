var totalPrice = 0;
var totalCars = 0;
var urusPrice = 222004;
var avantadorPrice = 421321;
var amgPrice = 100945;
var genesisPrice = 49925;
var jeskoPrice = 3000000;
var yukonPrice = 51995;
var tax = 0.7;
var taxToPay = 0;
var delivery = 0;

function validateForm(){
	
	var urus = document.querySelector("#urusTotal").value;
	var avantador = document.querySelector("#avantadorTotal").value;
	var amg = document.querySelector("#amgTotal").value;
	var genesis = document.querySelector("#genesisTotal").value;
	var jesko = document.querySelector("#jeskoTotal").value;
	var yukon = document.querySelector("#yukonTotal").value;
	var email = document.querySelector("#email").value;
	var password = document.querySelector("#password").value;
	this.totals();
	if((urus == "" ) || (avantador == "" ) || (amg == "") || (genesis == "") || (jesko == "") || (yukon == "")){
		alert("Please, put a value for each field.");
		return false;
	}
	if((urus == "0" ) && (avantador == "0" ) && (amg == "0")  && (genesis == "0") && (jesko == "0") && (yukon == "0")){
		alert("Select at least one car to buy.");
		return false;
	}
	if(this.totalCars < 1 || this.totalPrice < 1){
		alert("Select at least one car to buy.");
		return false;
	}
	if(email == "" || password == ""){
		alert("Fill in your email and password, please.");
		return false;
	}
	
	console.log(this.totalPrice + "---------");
	this.totalPrice = 0;
	this.taxToPay = 0;
	this.totalCars = 0;
	return true;
}

function shipCostCalc(){
	var shippingOption = document.getElementsByName("shipOptions");
	var price = 0;
	for(var i = 0; i < shippingOption.length; i++){
		if (shippingOption[i].checked){
			price = shippingOption[i].value;
		}
	}
	if(price == "free"){
		this.delivery = 0;
	}else if (price == "overNight"){
		this.delivery = 50;
	}else if (price == "threeDay"){
		this.delivery = 5;
	}
}

function totals(){
	var urus = parseInt(document.querySelector("#urusTotal").value);
	var avantador = parseInt(document.querySelector("#avantadorTotal").value);
	var amg = parseInt(document.querySelector("#amgTotal").value);
	var genesis = parseInt(document.querySelector("#genesisTotal").value);
	var jesko = parseInt(document.querySelector("#jeskoTotal").value);
	var yukon = parseInt(document.querySelector("#yukonTotal").value);
	this.shipCostCalc();

	this.totalPrice = (urus * this.urusPrice) + (avantador * this.avantadorPrice)+ (yukon * this.yukonPrice) + 
				(amg * this.amgPrice) + (genesis * this.genesisPrice) + (jesko * this.jeskoPrice);
	this.taxToPay = tax * totalPrice;
	this.totalCars = urus + avantador + amg + genesis + jesko + yukon;
	this.totalPrice += this.taxToPay + this.delivery;
}

function updateCost(){
	this.totals();
	this.shipCostCalc();
	document.querySelector("#totalCars").innerHTML = "$ " + this.totalCars;
	document.querySelector("#shipPrice").innerHTML = "$ " + this.delivery;
	document.querySelector("#tax").innerHTML = "$ " + this.taxToPay;
	document.querySelector("#totalPrice").innerHTML = "$ " + this.totalPrice;

	this.totalPrice = 0;
	this.taxToPay = 0;
	this.totalCars = 0;
}

/*urusTotal
avantadorTotal
amgTotal
genesisTotal
jeskoTotal
yukonTotal

shipOptions
email
password

totalCars
shipPrice
tax
totalPrice

free
overNight
threeDay*/