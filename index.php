<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="bg-dark d-flex justify-content-center align-items-center">
<div class="container w-50 shadow p-5 d-flex flex-column">
    <h4 class="text-light">Make transaction</h2>
    <button class="w-100 m-2" id="transactionBtn">Choose recipient</button>
    <form action="" method="POST">
    <div id="userContainer"></div>
    <input class="w-100 text-center m-2"id="from_amount" type="text" name="from_amount" placeholder="Amount e.g: 100"></input><br>
    <input class="w-100 text-center m-2" id="from_account" type="text" name="from_account" placeholder="Choose Sender"></input><br>
    <button class="w-100 btn btn-primary m-2" id="submitTransferBtn"type="submit">Submit Transaction</button>
    </form> 
    </div>
    <script src="public/app/scripts/main.js"></script>
</body>
</html>
