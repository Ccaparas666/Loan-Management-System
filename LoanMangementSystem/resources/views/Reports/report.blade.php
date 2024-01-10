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
        <table class="table table-bordered">
            <tr>
                <th>Borrower ID</th>
                <td>{{ $borrower->bno }}</td>
            </tr>
            <tr>
                <th>Account Number</th>
                <td>{{ $borrower->borAccount }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $borrower->borFname }} {{ $borrower->borMname ?? '' }} {{ $borrower->borLname }} {{ $borrower->borSuffix ?? '' }}</td>
            </tr>
            <tr>
                <th>Contact Number</th>
                <td>{{ $borrower->borContact }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $borrower->borEmail }}</td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td>{{ $borrower->borDob }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $borrower->borAddress }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $borrower->borGender }}</td>
            </tr>
            <tr>
                <th>Loan Status</th>
                <td>{{ $borrower->loanstatus }}</td>
            </tr>
        </table>

        <h2>Loan History</h2>
        @if($borrower->loans->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Loan ID</th>
                        <th>Loan Number</th>
                        <th>Loan Amount</th>
                        <th>Interest Rate</th>
                        <th>Loan Status</th>
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
