window.onload = function (){
	var elements = document.getElementsByTagName("button");
	var screen = document.querySelectorAll('p')[0];
	var clear =   document.getElementsByClassName('clear')[0];
	
	for(var i=0;i<elements.length;i+=1){
            if(elements[i].innerHTML === '='){
                elements[i].addEventListener("click", calculations(i));
            }else{
                 elements[i].addEventListener("click", operations(i));
		  }
                }
function operations (i){
    return function(){
        if (elements[i].innerHTML === "÷") {
            screen.innerHTML  +=  "/" ;
      }else if(elements[i].innerHTML === "x"){
            screen.innerHTML += "*";
	} else if(elements[i].innerHTML === "^"){
            screen.innerHTML += "**";}
        else{
            screen.innerHTML  += elements[i].innerHTML;
            }
        };
   }
 
/*Clear button*/
clear.onclick = function () {
    screen.innerHTML = '';
  }; 

/*Returning results*/
 function calculations(i) {
    return function () {
        screen.innerHTML = eval(screen.innerHTML);
    };
  }
};

/*Sources:
 * 1. Immidiate display on page (window.onload): https://www.w3schools.com/jsref/event_onload.asp
 *  1.1 How to implement it: https://developer.mozilla.org/en-US/docs/Web/API/GlobalEventHandlers/onload
 * 2. Pulling html content to display (document. ): https://developer.mozilla.org/en-US/docs/Web/API/Document
 * 3. Button actions (addeventlistener): https://www.w3schools.com/JSREF/tryit.asp?filename=tryjsref_element_addeventlistener
 * 4. JS structure help: https://stackoverflow.com/questions/38209905/javascript-calculator
*  5. The JS in this helped me with adding multiple values after making first calculation: https://dev.to/coolscratcher/make-a-calculator-with-html-css-and-js-2o48
*  6. innerHTML used for displaying my results inspo: https://code-maven.com/slides/javascript/solution-calculator
*  7. Calculating reading symbols inspo: https://sites.google.com/site/ivanolivarescis2336/_/rsrc/1336321745157/week11-assignments/calculator/Calculator_Sournce.JPG
*  
*/








