<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
            #contact {
	            
	            margin-top: 50px;
	            
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Path Manager
                </div>

                <div id="instructions">
                	
                	<h3>Description</h3>
                	
                	<p>Path Manager provides a clean API for submitting and viewing geo-location paths.</p>
                	
                	<h3>Endpoints</h3>
                	
                	<p><b>/paths</b> - <i>(Method: POST)</i> : A formatted json string or array can be sent to this uri and ill be stored in the database.</p>
                	<p><b>/paths</b> - <i>(Method: GET)</i> : A formatted json string will be returned containing all stored paths.</p>
                	<p><b>/paths/{id}</b> - <i>(Method: GET)</i> : A formatted json string will be returned a path with the specified id.</p>
                
                </div>
                
                <p id="contact">Having trouble? <br /> Contact <a href="mailto:jesse@tinylittleumbrella.com">jesse@tinylittleumbrella.com</a></p>
            </div>
        </div>
    </body>
</html>
