$( '.friend-drawer--onhover' ).on( 'click',  function() {
  
    $( '.chat-bubble' ).hide('slow').show('slow');
    
  });

function myFunction(num) {
  var mainFrameOne = document.getElementById("1"); 
  var mainFrameTwo = document.getElementById("2");
  var mainFrameThree = document.getElementById("3");
  var mainFrameFour = document.getElementById("4");

  if (num == 1) {
    mainFrameOne.style.display = "block"; 
    mainFrameTwo.style.display = "none"; 
    mainFrameThree.style.display = "none"; 
    mainFrameFour.style.display = "none"; 
    scrollDown();
  } else if (num == 2) {
    mainFrameOne.style.display = "none"; 
    mainFrameTwo.style.display = "block"; 
    mainFrameThree.style.display = "none"; 
    mainFrameFour.style.display = "none"; 
    scrollDown();
  } else if (num == 3) {
    mainFrameOne.style.display = "none"; 
    mainFrameTwo.style.display = "none"; 
    mainFrameThree.style.display = "block"; 
    mainFrameFour.style.display = "none"; 
    scrollDown();
  } else if (num == 4) {
    mainFrameOne.style.display = "none"; 
    mainFrameTwo.style.display = "none"; 
    mainFrameThree.style.display = "none"; 
    mainFrameFour.style.display = "block"; 
    scrollDown();
  }
}

function scrollDown(){
  var element = document.getElementById(11);
  element.scrollTop = element.scrollHeight - element.clientHeight;
}
