
function myFunction(num) {
  scrollDown();
}

function scrollDown(){
  var element = document.getElementById(11);
  element.scrollTop = element.scrollHeight - element.clientHeight;
}
