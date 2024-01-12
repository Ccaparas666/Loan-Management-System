<!-- <!DOCTYPE html>
<html>
<head>
    <title>Loan Management System - Borrower Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        h1 {
            color: #007BFF;
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }
        table {
            /* border-collapse: collapse; */
            width: 100%;
        }
        th, td {
            /* border: 1px solid #dddddd; */
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <table>
    <thead>
        
        <tr>
            <th>Date</th>
            <th>Loan No.</th>
            <th>Reference No.</th>
            <th>Loan Amount</th>
            <th>Balance</th>
            <th>Payment</th>
        
        </tr>

        <tr>
            <th>Name: </th>
            <th>Account No. </th>
            <th>BAC-0001</th>
          
        </tr>
    </thead>
    <tbody>
      
        <tr>
            <td>2023-01-01</td>
            <td>LNO-00000</td>
            <td></td>
            <td>P 2500</td>
            <td>P 3000</td>
            <td>P 200</td>
           
        </tr>
       <br>
        <tr>
            <td>Record : 1 Records</td> 
            <td></td> 
            <td>Total Loan: PHP</td>
            <td>P 600</td>
            <td>P 3000</td>
            <td>P 200</td>
           
        </tr>
       
    </tbody>
</table>
</body>
</html> -->

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Loan Management System - Borrower Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        h1 {
            color: #007BFF;
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }
        table {
            /* border-collapse: collapse; */
            width: 100%;
        }
        th, td {
            /* border: 1px solid #dddddd; */
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <table>
    <thead>
        
        <tr>
            <th>Date</th>
            <th>Loan No.</th>
            <th>Reference No.</th>
            <th>Loan Amount</th>
            <th>Balance</th>
            <th>Payment</th>
        
        </tr>
<br>
        <tr>
            <th>Name: </th>
            <th>Account No. </th>
            <th>BAC-0001</th>
          
        </tr>
        <br>
    </thead>
    <tbody>
      
        <tr>
            <td>2023-01-01</td>
            <td>LNO-00000</td>
            <td></td>
            <td>P 2500</td>
            <td>P 3000</td>
            <td>P 200</td>
           
        </tr>
       <br>
        <tr border="1">
            <td>Record : 1 Records</td> 
            <td></td> 
            <td>Total Loan: PHP</td>
            <td>P 600</td>
            <td>P 3000</td>
            <td>P 200</td>
           
        </tr>
       
    </tbody>
</table>
</body>
</html> -->



<!-- <!DOCTYPE html>
<html>
<head>
    <title>Loan Management System - Borrower Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        h1 {
            color: #007BFF;
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }
        table {
            /* border-collapse: collapse; */
            width: 100%;
        }
        th, td {
            /* border: 1px solid #dddddd; */
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Loan No.</th>
          
            <th>Loan Amount</th>
            <th>Balance</th>
            <th>Payment</th>
        </tr>
       
    </thead>
    <tbody>
        @foreach($borrowers as $borrower)
            @foreach($borrower->loans as $loan)
                <tr>
                    <td>{{ $loan->cash_release_date }}</td>
                    <td>{{ $loan->loanNumber }}</td>
                 
                    <td>{{ $loan->LoanAmount }}</td>
                    <td>{{$loan->Remaining_Balance}}</td>
                    <td>{{ $loan->payments->sum('payment_amount') }}</td>
                </tr>
            @endforeach
        @endforeach
        <tr border="1">
            <td>Record : {{ $totalRecords }} Records</td> 
     
            <td>Total Loan: PHP</td>
            <td>P {{ $totalLoanAmount }}</td>
            <td>P {{ $totalBalance }}</td>
            <td>P {{ $totalPayment }}</td>
        </tr>
    </tbody>
</table>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Summary</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Loan Summary</h2>

<!-- Borrower 1 -->
<h3>Name: Carmelo Caparas</h3>
<p>Account No.: BAC0001</p>

<table>
    <thead>
        <tr>
            <th>Loan Date</th>
            <th>Loan No.</th>
            <th>Loan Amount</th>
            <th>Balance</th>
            <th>Payment</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2012-2001</td>
            <td>BAC-10000</td>
            <td>P 1000</td>
            <td>P 1000</td>
            <td>P 1000</td>
        </tr>
        <!-- Repeat the above row for each loan -->

        <!-- Total Row -->
        <tr>
            <td colspan="2"><strong>Total</strong></td>
            <td><strong>P 3000</strong></td>
            <td><strong>P 3000</strong></td>
            <td><strong>P 3000</strong></td>
        </tr>
    </tbody>
</table>

<!-- Borrower 2 -->
<h3>Name: Rence Gwynneth</h3>
<p>Account No.: BAC0001</p>

<table>
    <thead>
        <tr>
            <th>Loan Date</th>
            <th>Loan No.</th>
            <th>Loan Amount</th>
            <th>Balance</th>
            <th>Payment</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2012-2001</td>
            <td>BAC-10000</td>
            <td>P 1000</td>
            <td>P 1000</td>
            <td>P 1000</td>
        </tr>
        <!-- Repeat the above row for each loan -->

        <!-- Total Row -->
        <tr>
            <td colspan="2"><strong>Total</strong></td>
            <td><strong>P 3000</strong></td>
            <td><strong>P 3000</strong></td>
            <td><strong>P 3000</strong></td>
        </tr>
    </tbody>
</table>

<!-- All Total -->
<h3>All Total</h3>

<table>
    <thead>
        <tr>
            <th colspan="2">Date Range</th>
            <th>Total Amount</th>
            <th>Total Balance</th>
            <th>Total Payment</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">12-12-2024 - 12-12-2023</th>
            <td >P 6000</td>
            <td>P 6000</td>
            <td>P 3000</td>
        </tr>
    </tbody>
</table>

</body>
</html>

