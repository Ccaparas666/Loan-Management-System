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

@foreach($borrowers as $borrower)
    <h3>Name: {{ $borrower->borFname }} {{ $borrower->borLname }}</h3>
    <p>Account No.: {{ $borrower->borAccount }}</p>

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
            @foreach($borrower->loans as $loan)
                <tr>
                    <td>{{ $loan->LoanApplication }}</td>
                    <td>{{ $loan->loanNumber }}</td>
                    <td>Php {{ number_format($loan->LoanAmount, 2) }}</td>
                    <td>Php {{ number_format($loan->payments->sum('Remaining_Balance'), 2) }}</td>
                    <td>
                        @foreach ($borrower->transactionHistories as $transactionHistory)
                        <p>Php {{ $transactionHistory->PaymentAmount }}</p>
                        @endforeach
                    </td>
                </tr>
            @endforeach

            <!-- Total Row -->
            <tr>
                <td colspan="2"><strong>Total</strong></td>
                <td><strong>Php {{ number_format($borrower->loans->sum('LoanAmount'), 2) }}</strong></td>
                <td>Php {{ number_format($loan->payments->sum('Remaining_Balance'), 2) }}</td>
                
                <td><strong>@foreach ($loan->payments as $payment)
        Php {{ number_format($payment->PaymentAmount, 2) }}
    @endforeach</strong></td>
            </tr>
        </tbody>
    </table>
@endforeach

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
            <td colspan="2">{{ $borrowers->min('loans.0.LoanApplication') }} - {{ $borrowers->max('loans.0.LoanApplication') }}</td>
            <td>Php {{ number_format($borrowers->flatMap->loans->sum('LoanAmount'), 2) }}</td>
            
            <td>Php {{ number_format($borrowers->flatMap->loans->flatMap->payments->sum('Remaining_Balance'), 2) }}</td>
            <!-- <td>P {{ number_format($loan->calculateBalance(), 2) }}</td> -->
                        <td>Php 0</td>

        </tr>
    </tbody>
</table>

</body>
</html>
