<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/css/constants.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/custom.css')}}">

</head>
<body>
   
    <div class="container">
        <div class="row  d-flex justify-content-center">
            <div class="col-4 my-5 d-flex justify-content-center">
                <input type="text" name="base_url" id="base_url" value="{{request()->root()}}"  class="form-control w-300px">
            </div>
        </div>
        <div class="row  d-flex justify-content-center">
            <div class="col-4 d-flex justify-content-center">
                <div class="calculator mt-5">

                    <div class="head h-30 w-100">

                        <input type="text" name="input" readonly id="input" placeholder="0"  class="screen screen-input">
                        <input type="text" name="output" readonly id="output" value="0"  dir="ltr" class="screen screen-output">
                        
                    </div>

                    <div class="body h-70 w-100 d-flex justify-content-around flex-wrap">

                        <x-button text="Clear" class="button w-128px button-dark" />
                        <x-button text="" class="button-empty" />
                        <x-button text="/" class="button button-dark" />
                        <x-button text="7" class="button"/>
                        <x-button text="8" class="button"/>
                        <x-button text="9" class="button"/>
                        <x-button text="x" class="button button-dark" />
                        <x-button text="4" class="button"/>
                        <x-button text="5" class="button"/>
                        <x-button text="6" class="button"/>
                        <x-button text="-" class="button button-dark" />
                        <x-button text="1" class="button"/>
                        <x-button text="2" class="button"/>
                        <x-button text="3" class="button"/>
                        <x-button text="+" class="button button-dark" />
                        <x-button text="0" class="button w-128px" />
                        <x-button text="," class="button"/>
                        <x-button text="=" class="button button-dark" />
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('/javascript/helpers.js') }}"></script>
    <script >

        const base_url = document.getElementById('base_url').value;

        let input_screen = document.getElementById('input');
        let output_screen = document.getElementById('output');

        let calculator = {
             first_input : '',
             second_input : '',
             operator : '',
        }

        clear(input_screen, output_screen, calculator);

        // Get the text of button and run the calculator
        function getText(text){

            if(text == 'Clear'){
                clear(input_screen, output_screen, calculator);
            }else if(text == '='){
                if(calculator.first_input != '' && calculator.operator != '' && calculator.second_input){
                    getResult(base_url + '/api/calculator', { calculator })
                    .then(result => {
                        output_screen.value = result;
                    });
                }
            }else{
                addText(input_screen, output_screen, text, calculator)
            }

        }

    </script>

</body>
</html>
