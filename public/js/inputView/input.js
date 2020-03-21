var inputTime = new Date(); // getting current date and time
var timestampStrElm;
var timestampElm;
var storeElm;
var storeBranchElm;
var locationElm;


window.onload = function () {
    timestampStrElm = document.getElementById("timestampStr");
    timestampElm = document.getElementById("timestamp");
    storeElm = document.getElementById("store");
    storeBranchElm = document.getElementById("storeBranch");
    locationElm = document.getElementById("location");

    setInputTime(); // setting up current time
    navigator.geolocation.getCurrentPosition(setInputLocation); // setting up current location
};

function setInputTime(){
    timestampStrElm.value = convertDateToStr(inputTime);
    timestampElm.value = Math.floor(inputTime.getTime() / 1000); //getting Unixtime (seconds)
}

function setInputLocation(position){
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude
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
    timestampStrElm.focus();

}

function onclickDownCount(){
    inputTime.setMinutes(inputTime.getMinutes() - 1);
    setInputTime();
    timestampStrElm.focus();

}