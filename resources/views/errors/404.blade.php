<!DOCTYPE html>
<html>
<head>
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg {
            /* The image used */
            background-image: url("{{ asset('img/error.jpg') }}");

            /* Full height */
            height: 70%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }
        p
        {
            text-align: center;
            color: #9a161a;
            text-decoration: underline;
            text-shadow: 1px 1px red;
            font-family: "Times New Roman", Georgia, Serif;
            font-size: 50px;
        }
    </style>
    <title>Page not found.</title>
</head>
<body>
<p>Oops ! Something went wrong. <br>
    The Page you are searching for is not found !
</p>
<div class="bg"></div>

</body>
</html>