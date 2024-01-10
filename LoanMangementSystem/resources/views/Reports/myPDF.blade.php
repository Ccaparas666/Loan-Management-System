<!DOCTYPE html>
<html>
<head>
    <title>Loan Management System - Summary Report</title>
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
    <p>This report provides a summary of borrowers and their loan details.</p>
  
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Borrower ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Loans</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowers as $borrower)
            <tr>
                <td>{{ $borrower->bno }}</td>
                <td>{{ $borrower->borFname }} {{ $borrower->borLname }}</td>
                <td>{{ $borrower->borContact }}</td>
                <td>{{ $borrower->borEmail }}</td>
                <td>{{ $borrower->borAddress }}</td>
                <td>{{ $borrower->borGender }}</td>
                <td>
                    @if($borrower->loans->count() > 0)
                        <ul>
                            @foreach($borrower->loans as $loan)
                                <li>Loan Number: {{ $loan->loanNumber }}, Amount: {{ $loan->LoanAmount }}, Status: {{ $loan->loanstatus }}</li>
                            @endforeach
                        </ul>
                    @else
                        No loans found.
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
