function updateClock(){
  const secDiv =document.getElementById('sec');
  const minDiv =document.getElementById('min');
  const hourDiv =document.getElementById('hour');
  let date = new Date();
  let sec =date.getSeconds()/60;
  let min =(date.getMinutes()+sec)/60;
  let hour=(date.getHours()+min)/12;
  secDiv.style.display = 'block';
  secDiv.style.transform = 'rotate('+(sec * 360)+'deg)';
  minDiv.style.transform = 'rotate('+(min * 360)+'deg)';
  hourDiv.style.transform = 'rotate('+(hour * 360)+'deg)';
}
setInterval(updateClock,1000);

