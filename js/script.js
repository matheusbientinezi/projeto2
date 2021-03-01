var date = new Date();

date.setDate(1);


var month = date.getMonth();

var monthDays = document.querySelector(".days");

var lastDay = new Date(date.getFullYear(),date.getMonth()+1,0).getDate();

var prevLastDay = new Date(date.getFullYear(),date.getMonth(),0).getDate();

var firstDayIndex = date.getDay();

var lastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth()+1,
    0
).getDay();

var nextDays = 7 - lastDayIndex-1;

var months = [

    "Janeiro",
    "Fevereiro",
    "Março",
    "Abril",
    "Maio",
    "Junho",
    "Julho",
    "Agosto",
    "Setembro",
    "Outubro",
    "Novembro",
    "Dezembro",

]

document.querySelector(".date h2").innerHTML=months[date.getMonth()];

document.querySelector(".date p").innerHTML=date.toDateString();

var days = "";

for(let x = firstDayIndex; x > 0; x--){
    days+=`<div class="prev-date">${prevLastDay - x+1}</div>`;
}

for (var i = 1; i <= lastDay; i++){
    if(i===new Date().getDate() && date.getMonth()===new Date().getMonth()){
    days += `<div class="today">${i}</div>`;  
    }else{
    days += `<div>${i}</div>`;
    }
}

 for(let j =1; j<= nextDays; j++){
     days+=`<div class="next-date">${j}</div>`;
     monthDays.innerHTML = days;
 }