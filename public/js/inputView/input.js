var inputTime = new Date(); // getting current date and time
var timestampStrElm;
var timestampElm;
var placeElm;
var addressElm;
var displayedAddressElm;
var locationElm;


window.onload = function () {
    timestampStrElm = document.getElementById("timestampStr");
    timestampElm = document.getElementById("timestamp");
    placeElm = document.getElementById("place");
    addressElm = document.getElementById("address");
    displayedAddressElm = document.getElementById("displayedAddress");
    locationElm = document.getElementById("location");

    setInputTime(); // setting up current time
    navigator.geolocation.getCurrentPosition(function(position){
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        setInputLocation(latitude, longitude); // setting up current location
    });
};

function setInputTime(){
    timestampStrElm.value = convertDateToStr(inputTime);
    timestampElm.value = Math.floor(inputTime.getTime() / 1000); //getting Unixtime (seconds)
}

function setInputPlace(name){
    placeElm.value = name;
}

function setInputAddress(address){
    displayedAddressElm.innerHTML = address;
    addressElm.value = address;
}

function setInputLocation(latitude, longitude){
    locationElm.value = latitude + "," + longitude; //getting geolocation
    initializeMap(latitude, longitude); // a function in map.js to draw a map
}



function convertDateToStr(date){
    const engMonthList = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

    var year = date.getFullYear();
    var month = engMonthList[date.getMonth()];
    var day = ("0" + date.getDate()).slice(-2); // padding "0";
    var hour = ("0" + date.getHours()).slice(-2); // padding "0";
    var min = ("0" + date.getMinutes()).slice(-2); // padding "0"

    return  month + "-" + day + ", " + year + " " + hour + ":" + min;
}


function onclickUpCount(){
    inputTime.setMinutes(inputTime.getMinutes() + 1);
    setInputTime();

}

function onclickDownCount(){
    inputTime.setMinutes(inputTime.getMinutes() - 1);
    setInputTime();

}