<!DOCTYPE html>
<html xmlns:text-align="http://www.w3.org/1999/xhtml">
<head>
    <style>
        body  {
            background-image: url("http://www.allwhitebackground.com/images/2/2270.jpg");
            background-color: #cccccc;
        }
        .closePostDonation{

            height: 200px;

            width: 800px;

            position: fixed;

            top: 50%;

            left: 50%;

            margin-top: -100px;

            margin-left: -400px;
            word-wrap: break-word ;

        }
        .closeDonationBtn
        {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

    </style>
</head>
<body>

<div class="closePostDonation">
    <h2 style="text-align:center;font-size:250%;">Donation Request Successfully Submitted </h2>

    <h4 style="text-align:center;font-size:150%;">Thank You</h4>

    <div align="center"  >
        <script>
            if (window.self !== window.top) {
                $("#closeinIfr").hide();
            }
        </script>
        <button class="closeDonationBtn"  onclick="self.close()">Close</button>
    </div>
</div>
</body>
</html>