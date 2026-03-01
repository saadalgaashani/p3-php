
var num1= '', num2 = '', operation = '',finalResults = '';
function getValue(e) {
    const buttonVlaue = e.target.textContent;
    if(finalResults){
        return;
    }
     else if(isNaN(buttonVlaue)){
        operation = buttonVlaue;
     } else if(!operation){
        num1 += buttonVlaue
     }else{ 
        num2 += buttonVlaue
     }



     show0nScreen()  
   }

   function show0nScreen(){

    const _num1 = num1 || '_'
    const _operation = operation || '_'
    const _num2 = num2 || '_'
    const _finalResults = finalResults || '_'



    document.getElementById("screen").innerHTML = _num1 + ''+_operation+''+ _num2 +'=' + _finalResults;


   }

   function calc() {
    if(operation === '+'){
        finalResults = sum(num1,num2);
    }else if(operation === '-'){
        finalResults = subtract(num1,num2);
    }else if(operation === 'X'){
        finalResults = multiply(num1,num2);
    }else if(operation === '/'){
        finalResults = divide(num1,num2);
    }
    
    show0nScreen()
   }

   function sum(val1, val2){
    return parseInt(val1) + parseInt(val2);
   }
   function subtract(val1, val2){
    return parseInt(val1) - parseInt(val2);
   }
   function multiply(val1, val2){
    return parseInt(val1) * parseInt(val2);
   }
   function divide(val1, val2){
    return parseInt(val1) / parseInt(val2);
   }

   function clearAll(){
    num1= ''
    num2 = ''
    operation = ''
    finalResults = ''
    show0nScreen();

   }
   


    
    

