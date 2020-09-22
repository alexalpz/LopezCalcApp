window.onload = function (){
    var buttons = document.getElementsByTagName("button");
    var clear = document.getElementById("clear");
        
    for(var i=0;i<buttons.length;i+=1){
        if(buttons[i].innerHTML === '='){
            buttons[i].addEventListener("click", calculations(i));
        }else{
            buttons[i].addEventListener("click", operations(i));
            }
        }
                
function operations (i){
    return function(){
        if (buttons[i].innerHTML === "+") {
            document.getElementById("inputField").value += "+" ;
        }else if (buttons[i].innerHTML === "÷") {
            document.getElementById("inputField").value += "/" ;
        }else if(buttons[i].innerHTML === "x"){
            document.getElementById("inputField").value += "*";
        }else if (buttons[i].innerHTML === "-") {
            document.getElementById("inputField").value  += "-" ;
        }else if(buttons[i].innerHTML === "^"){
            document.getElementById("inputField").value += "**";
        }else{
            document.getElementById("inputField").value  += buttons[i].innerHTML;
        }
     };
   }
   
clear.onclick = function () {
    document.getElementById("inputField").value = "" ;
  }; 
  
function calculations() {
    return function () {   
       /*eval shows "infinity" if result too long or "NaN" if not equatable*/
       document.getElementById("inputField").value = eval(document.getElementById("inputField").value);
    };
  }
};

/*Sources:
 * 1. Immidiate display on page (window.onload): https://www.w3schools.com/jsref/event_onload.asp
 *  1.1 implementing window.onload: https://developer.mozilla.org/en-US/docs/Web/API/GlobalEventHandlers/onload
 * 2. Pulling html content to display (document. ): https://developer.mozilla.org/en-US/docs/Web/API/Document
 * 3. Button actions (addeventlistener): https://www.w3schools.com/JSREF/tryit.asp?filename=tryjsref_element_addeventlistener
 * 4. JS structure help: https://stackoverflow.com/questions/38209905/javascript-calculator
*  5. The JS in this helped me with adding multiple values after making first calculation: https://dev.to/coolscratcher/make-a-calculator-with-html-css-and-js-2o48
*  6. Reading symbols to then translate to actual operations inspo: https://sites.google.com/site/ivanolivarescis2336/_/rsrc/1336321745157/week11-assignments/calculator/Calculator_Sournce.JPG
*  7. Eval function for calculating string expressions: http://hepunx.rl.ac.uk/~adye/jsspec11/builtin.htm
*  
*/