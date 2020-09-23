const now = new Date();
const year = now.getFullYear();
const month = now.getMonth();
const date = now.getDate();

const nyear= document.querySelector('.year');
const nmonth= document.querySelector('.month');
const ndate= document.querySelector('.date');

nyear.innerHTML = year-1911;
nmonth.innerHTML = month+1;
ndate.innerHTML = date;