function nobackbutton(){

   window.location.hash="";
   window.location.hash="" //chrome
   window.onhashchange=function(){window.location.hash="";}

}