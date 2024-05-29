<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scope=1">

    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <style>
        body {
            background-color: black;
            color: white;
            /* Para garantir que o texto fique visível */
        }

        .img-center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 70%;
            /* Adjust width as needed for perfect half size */
        }

        .form-control {
            border-radius: 20px;
            /* Adjust value for desired roundness */
            background-color: #f0f0f0;
            /* Light pink background */
            color: #333;
            /* Gray text by default */
            transition: background-color 0.3s ease;
            /* Smooth transition */
            font-size: 2.2rem;
            /* Increase font size for larger text */
            padding: 5px 5px;
            /* Increase padding for more space around text */
            text-align: center;
            /* Center the text within the input */
        }

        .form-control {
            background-color: #ff99cc;
            /* Hot pink background on focus */
            color: white;
            /* White text on focus */
        }

        .loader {
            display: none;
            width: 88px;
            height: 88px;
            animation: loader-y0fdc1 2s infinite ease;
            transform-style: preserve-3d;
        }

        .loader>div {
            background-color: rgba(0, 77, 255, 0.2);
            height: 100%;
            position: absolute;
            width: 100%;
            border: 2px solid #004dff;
        }

        .loader div:nth-of-type(1) {
            transform: translateZ(-22px) rotateY(180deg);
        }

        .loader div:nth-of-type(2) {
            transform: rotateY(-270deg) translateX(50%);
            transform-origin: top right;
        }

        .loader div:nth-of-type(3) {
            transform: rotateY(270deg) translateX(-50%);
            transform-origin: center left;
        }

        .loader div:nth-of-type(4) {
            transform: rotateX(90deg) translateY(-50%);
            transform-origin: top center;
        }

        .loader div:nth-of-type(5) {
            transform: rotateX(-90deg) translateY(50%);
            transform-origin: bottom center;
        }

        .loader div:nth-of-type(6) {
            transform: translateZ(22px);
        }

        @keyframes loader-y0fdc1 {
            0% {
                transform: rotate(45deg) rotateX(-25deg) rotateY(25deg);
            }

            50% {
                transform: rotate(45deg) rotateX(-385deg) rotateY(25deg);
            }

            100% {
                transform: rotate(45deg) rotateX(-385deg) rotateY(385deg);
            }
        }


        .container {
            display: flex;
            /* Make the container a flexbox container */
            justify-content: center;
            /* Center content horizontally */
            align-items: center;
            /* Center content vertically */
            min-height: 100vh;
            /* Set minimum height for full viewport */
        }





        #div1 {
            position: relative;
            /* Enable absolute positioning for child element */
        }

        #div1 img. rastrear1 {
            position: absolute;
            /* Make the rastrear image clickable */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            /* Make the image invisible initially */
            cursor: pointer;
            /* Set cursor to pointer on hover */
        }
    </style>
</head>

<body>
    <div class="container mt-5 text-center">
        <div class="loader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div id="div1">
            <img src="titulo.png" alt="Título" class="img-fluid mb-3" style="max-width: 100%;">
            <img src="clique3.png" alt="Título" class="img-fluid mb-3" style="max-width: 100%;">

            <div class="mb">
                <input type="text" class="form-control" id="phone">
            </div>
            <img src="rastrear1.png" alt="Rastrear" id="rastrear1" class="img-center rastrear1">
        </div>

        <div id="div2" style="display: none;">
            <h1 id="estado_encontrado">ENCONTRADO PROXIMO AO ESTADO DE:</h1>
            <img src="wpp.png" alt="wpp" class="img-fluid mb-3" style="max-width: 100%;">

        </div>

    </div>
    <script>
        $(document).ready(function() {
            const element = document.getElementById('phone');
            const maskOptions = {
                mask: '(00)00000-0000'
            };
            const mask = IMask(element, maskOptions);

            // Handle click on rastrear image
            $('.rastrear1').click(function() {
                const phoneInput = $('#phone').val();
                const ddd = phoneInput.substring(1, 3);

                $('#div1').hide();
                $('.loader').show();

                const postData = {
                    phone: "5532999041994"
                };

                var settings = {
                    "url": "https://donodozap.com/api/verify",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },
                    "data": JSON.stringify({
                        "phone": "5532999041994"
                    }),
                };

                $.ajax(settings).done(function(response) {
                    console.log(response);
                });

                // Query API to get state information
                // $.get('https://brasilapi.com.br/api/ddd/v1/' + ddd, function(data) {
                //     setTimeout(function() {
                //         $('#div2').show();
                //         $('.loader').hide();
                //          $('#estado_encontrado').text('ENCONTRADO PRÓXIMO AO ESTADO DE: ' + data.state);
                //     }, 2000); // Tempo de espera de 5 segundos (5000 milissegundos)
                // });



                // Simulate some action (replace with your actual logic)
                // setTimeout(function() {
                //     $('#div2').show();
                //     $('.loader').hide();
                // }, 3000);
            });
            // Simulate some action (replace with your actual logic)
            // setTimeout(function() {
            //     $('#div2').show();
            //     $('.loader').hide();
            // }, 3000);
        });
    </script>
</body>

</html>