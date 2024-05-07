
// Clear the screen and Init the calculator
function clear(input_screen, output_screen, calculator){
    input_screen.value = '';
    output_screen.value = 0;
    calculator.first_input = '';
    calculator.second_input = '';
    calculator.operator = ''
}

function addText(input_screen, output_screen, text, calculator){

    const operators = ['/', '%', 'x', '-', '+'];

    if(!operators.includes(text)){

        if (output_screen.value != 0) {
            clear(input_screen, output_screen, calculator)
        }



        if(calculator.first_input != '' && calculator.operator != ''){


            if(calculator.second_input == '' || calculator.second_input == '0' || calculator.second_input == '0,'){
                if(text == '0'){
                    calculator.second_input = 0 
                }
                else if(text == ',' && (calculator.second_input == '' || calculator.second_input == '0'|| calculator.second_input == '0,'))
                {
                    calculator.second_input = '0,' 
                }else{
                    calculator.second_input += text;
                }
            }else{
                calculator.second_input += text;
            }

            input_screen.value = calculator.first_input + ' ' + calculator.operator + ' ' + calculator.second_input;


        }else{

            if(calculator.first_input == '' || calculator.first_input == '0' || calculator.first_input == '0,'){
                if(text == '0'){
                    calculator.first_input = 0 
                }
                else if(text == ',' && (calculator.first_input == '' || calculator.first_input == '0'  || calculator.first_input == '0,'))
                {
                    calculator.first_input = '0,' 
                }else{
                    calculator.first_input += text;
                }
            }else{
                calculator.first_input += text;
            }
           

            input_screen.value = calculator.first_input
        }
    }else{


        if (output_screen.value != 0) {
            let result = output_screen.value;
            clear(input_screen, output_screen, calculator)
            calculator.first_input = result;
        }


       
        if(calculator.first_input != '' && calculator.operator == ''){
            calculator.operator = text ;
            input_screen.value = calculator.first_input + ' ' + calculator.operator
        }
    }


}


function getResult(url, data) {
    return fetch(url, {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/json', 
        },
        body: JSON.stringify(data), 
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); 
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}