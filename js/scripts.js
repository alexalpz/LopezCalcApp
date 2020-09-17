/* 
    Name: Alexa Lopez
    Project: Calculator Application
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

