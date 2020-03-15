var inputTime = new Date(); // getting current date and time

window.onload = function () {
    setInputTime();
};

function setInputTime(){
    var timestampStrElm = document.getElementById("timestampStr");
    var timestampElm = document.getElementById("timestamp");

    timestampStrElm.value = convertDateToStr(inputTime);
    timestampElm.value = Math.floor(inputTime.getTime() / 1000); //getting Unixtime (seconds)
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