window.onload = function (){
    
function operations (i){
    return function(){
        if (buttons[i].innerHTML === "+") {
            document.getElementById("inputField").value += "+" ;
        }else if (buttons[i].innerHTML === "÷") {
            document.getElementById("inputField").value += "/" ;
        }else if(buttons[i].innerHTML === "×"){
            document.getElementById("inputField").value += "*";
        }else if (buttons[i].innerHTML === "-") {
            document.getElementById("inputField").value  += "-" ;
        }else if(buttons[i].innerHTML === "^"){
            document.getElementById("inputField").value += "**";
        }else{
            document.getElementById("inputField").value  += buttons[i].innerHTML;}}
    ;}

var buttons = document.getElementsByTagName("button");   
for(var i=0;i<buttons.length;i+=1){
    if(buttons[i].innerHTML === '='){
        buttons[i].addEventListener("click", calculations(i));
    }else{
        buttons[i].addEventListener("click", operations(i));}}

var clear = document.getElementById("clear");  
clear.onclick = function () {
    document.getElementById("inputField").value = "" ;
  }; 
  
function calculations() {
    return function () {   
       /*eval shows "infinity" if result too long or "NaN" if not equatable*/
       document.getElementById("inputField").value = eval(document.getElementById("inputField").value);};}
       
};


//Security Features. I may add the security features on PHP to avoid JS disabling. 
//
//White listing characters on input
function checking(){
  var x = document.getElementById("inputField").value  
  var regex=/[0-9]\b/;  
    if (x.match(regex) || (x==="+") || (x==="-") || (x==="*") || (x==="/") || (x==="**"))
    {
      document.getElementById("inputField").innerHTML="";
      return true;
    }
    else if(!(x.match(regex))){
      document.getElementById("inputField").innerHTML="You can only input numbers and the following signs + - * / **";
      x = x.substring(0, x.length - 1);   
       document.getElementById("inputField").value = x;
      return false;
    }
}

//Disabling copy and paste on the input field
 $(document).ready(function () {
    $('input.disablecopypaste').bind('copy paste', function (e) {
       e.preventDefault();
    });
  });



//Memory Buttons 
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("memory-list");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

//Memory Functions
var memoryRegister = [];

var memorySave = function() {
  var num = document.getElementById("inputField");
  if (Number.isNaN(num)) return;
    memoryRegister.push(num);

  $('.memory-list').html('');
  memoryRegister.forEach(function(element) {
    $('.memory-list').append('<li>' + element + '</li>')
  });
}

var memoryRecall = function() {
  $('.memory-list').toggle("fast", function(){});
}

var memoryClear = function() {
  memoryRegister = [];
  $('.memory-list').hide("fast", function(){});
  $('.memory-list').html('');
}

var memoryList = function() {
  $('.readout').text($(this).text());
}

$('#memory-save').click(memorySave);
$('#memory-recall').click(memoryRecall);
$('#memory-clear').click(memoryClear);
$('.memory-list').on('click', 'li', memoryList);


/*Sources:
 * 1. Immidiate display on page (window.onload): https://www.w3schools.com/jsref/event_onload.asp
 *  1.1 implementing window.onload: https://developer.mozilla.org/en-US/docs/Web/API/GlobalEventHandlers/onload
 * 2. Pulling html content to display (document. ): https://developer.mozilla.org/en-US/docs/Web/API/Document
 * 3. Button actions (addeventlistener): https://www.w3schools.com/JSREF/tryit.asp?filename=tryjsref_element_addeventlistener
 * 4. JS structure help: https://stackoverflow.com/questions/38209905/javascript-calculator
*  5. The JS in this helped me with adding multiple values after making first calculation: https://dev.to/coolscratcher/make-a-calculator-with-html-css-and-js-2o48
*  6. Reading symbols to then translate to actual operations inspo: https://sites.google.com/site/ivanolivarescis2336/_/rsrc/1336321745157/week11-assignments/calculator/Calculator_Sournce.JPG
*  7. Eval function for calculating string expressions: http://hepunx.rl.ac.uk/~adye/jsspec11/builtin.htm
*  8. Checking input characters: https://stackoverflow.com/questions/47642022/number-validation-for-javascript-simple-calculator-with-regex
*  9. Disabling copy and paste on my input field: https://stackoverflow.com/questions/1226574/disable-pasting-text-into-html-form
* 10. Memory dropbox: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_js_dropdown
 **/