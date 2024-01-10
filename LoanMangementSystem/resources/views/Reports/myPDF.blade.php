


<!DOCTYPE html>
<html>
<head>
    <title>Loan Management System - Loan Report</title>
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
            border-collapse: collapse;
            width: 100%;
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
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>This report provides information about loans in the system.</p>
  
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Borrower Name</th>
                <th>Account Number</th>
                <th>Loan Number</th>
                <th>Loan Amount</th>
                <th>Interest Rate</th>
                <th>Loan Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $loan)
            <tr>
                <td>{{ $loan->id }}</td>
                <td>{{ $loan->borrower_name }}</td>
                <td>{{ $loan->account_number }}</td>
                <td>{{ $loan->loan_number }}</td>
                <td>{{ $loan->loan_amount }}</td>
                <td>{{ $loan->interest_rate }}</td>
                <td>{{ $loan->loan_status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
