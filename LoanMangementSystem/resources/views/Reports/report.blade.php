<!DOCTYPE html>
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
    <p>This report provides information about borrowers and their loan history.</p>
  
    @foreach($borrowers as $borrower)
        <h2>Borrower Information</h2>
       

        <h2>Loan History</h2>
        @if($borrower->loans->count() > 0)
        <table style="width: 100%; table-layout: fixed;" class="table table-bordered">
    <thead>
        <tr> 
            <th style="width: 10%;">Loan Date</th>
            <th style="width: 10%;">Name</th>
            <th style="width: 15%;">Account No.</th>
            <th style="width: 15%;">Loan No.</th>
          
            <th style="width: 15%;">Loan Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($borrower->loans as $loan)
            <tr>
                <td>{{ $loan->lid }}</td>
                <td>{{ $loan->loanNumber }}</td>
                <td>PHP {{ number_format($loan->LoanAmount, 2) }}</td>
                <td>{{ $loan->InterestRate }}%</td>
                <td>{{ $loan->loanstatus }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

        @else
            <p>No previous loans found for this borrower.</p>
        @endif
    @endforeach
</body>
</html>
