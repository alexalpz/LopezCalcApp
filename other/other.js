/* 
 * Alexa Lopez
 * Calculator Application  * 
 */


/* Numbers Display*/
$('.number').click(function() {
    var firstNum = $('.calcInput').val()
    var number = $(this).html();
    firstNum +=number;   
    $('.calcInput').val(firstNum);
})

/*Result Function*/
function equals() {
    startVal = parseFloat($('.calcInput').val());
    $('.calcInput').val('');
    
}
/*Operations + Second values*/
$('.operation').click(function(){
  equals();
  secVal = parseFloat($('.calcInput').val());
  var operation = $(this).html();
  op = operation;
  $('.calcInput').val(operation);
})


/*Operations functionalities and results*/
$('.equals').click(function(){
   secVal = parseFloat( $('.calcInput').val());
  switch (op) {
    case "+":
      $('.calcOutput').val(startVal + secVal);
      break
    case "-": 
      $('.calcOutput').val(startVal - secVal);
      break
    case "*":
      $('.calcOutput').val(startVal * secVal);
      break
    case "%":
      $('.calcOutput').val(startVal % secVal);
      break
    case "^":
      $('.calcOutput').val(startVal ** secVal);
      break
    case "()":
      $('.calcOutput').val(startVal);
      break
    case "/":
      $('.calcOutput').val(startVal / secVal);
    default:
      $('.calcOutput').val('Oops! Something\'s wrong!');
  }
})

/*Clearing all input*/

$('.c').click(function() {
      $('.calcInput').val('');
      $('.calcOutput').val('');
})

/*Sources
 * 1. Displaying text: https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_onclick
 * 2. this method: https://www.w3schools.com/js/js_this.asp
 * 3. Returnin the values: https://www.w3schools.com/jquery/html_val.asp
 * 4. Converting to string to float number or NAN: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/parseFloat
 * 5. Switch calc operations: https://www.tutorialgateway.org/javascript-switch-case/
 */

*//////////////////////*

var display = [];

/*Adding functionality*/
function add(a, b){
    return a + b;
}

/*Subtracting*/
function minus(a, b){
    return a - b;
}

/*Multiplication*/
function times(a, b){
    return a * b;
}

/*Division*/
function divide(a, b){
    return a/b;
}

/*Display on screen*/
function screen(e){
    display.push(e);
   $('.userInput').val(e);
}

/*C Button*/
function clearScreen() {
    display = [];
    $('.userInput').val('');
}

function equals() {
    display = display.join("");
    blip = display.split(/(\D)/);
    a = blip[0];
    b = blip[2];
    a = parseInt(a);
    b = parseInt(b);
    switch(blip[1]){
        case "+":
            display = add(a, b);
            $('.userInput').val(display);
            break;
        case "-":
            display = minus(a, b);
            $('.userInput').val(display);
            break;
        case "*":
            display = times(a, b);
            $('.userInput').val(display);
            break;
        case "/":
            display = divide(a, b);
            $('.userInput').val(display);
            break;
    }
}

exports = {
    add,
    minus,
    times,
    divide,
    screen,
    equals,
    clearScreen
};

/*Sources:
 * 1. Functionalities: https://codepen.io/tag/calculator?cursor=ZD0xJm89MCZwPTQ=
 */


/*******************************************************************************************************/


window.onload = function (){
	var elements = document.getElementsByTagName("button");
	var screen = document.querySelectorAll('p')[0];
	var clear =   document.getElementsByClassName('clear')[0];
	
	for(var i=0;i<elements.length;i+=1){
            if(elements[i].innerHTML === '='){
                elements[i].addEventListener("click", calculate(i));
            }else{
                 elements[i].addEventListener("click", operations(i));
		  }
                }
function operations (i){
    return function(){
        if (elements[i].innerHTML === "÷") {
            screen.innerHTML  +=  "/ " ;
      }else if(elements[i].innerHTML === "x"){
            screen.innerHTML += "*";
	} else if(elements[i].innerHTML === "^"){
            screen.innerHTML += "**";}
        else{
            screen.innerHTML  += elements[i].innerHTML;
            }
        };
   }
 
clear.onclick = function () {
    screen.innerHTML = '';
  }; 

 function calculate(i) {
    return function () {
        screen.innerHTML = eval(screen.innerHTML);
    };
  }
};

