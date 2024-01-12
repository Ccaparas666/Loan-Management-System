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

    tbody tr:nth-child(even) {
        background-color: #f9f9f9; /* Light gray for even rows */
    }

    tbody tr:nth-child(odd) {
        background-color: #ffffff; /* White for odd rows */
    }
</style>
</head>
<body>

<h2>Borrowers Summary </h2>

@foreach($borrowers as $index => $borrower)
    <h3>Name: {{ $borrower->borFname }} {{ $borrower->borLname }}</h3>
    <p>Account No.: {{ $borrower->borAccount }}</p>

    

    <table>
    <thead>
        <tr>
            <th>Loan Date</th>
            <th>Loan No.</th>
            <th>Loan Amount</th>
            <th>Remaining Balance</th>
            <th>Loan Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($borrower->loans as $loan)
            <tr>
                <td>{{ $loan->LoanApplication }}</td>
                <td>{{ $loan->loanNumber }}</td>
                <td>Php {{ number_format($loan->LoanAmount, 2) }}</td>
                <td>Php {{ number_format($loan->payments->sum('Remaining_Balance'), 2) }}</td>
                <td>{{ $loan->loanstatus }}</td>
            </tr>
        @endforeach
      
          <!-- Total Row per Borrower -->
          <tr>
            <td colspan="2"><strong>Total</strong></td>
            <td><strong>Php {{ number_format($borrower->loans->sum('LoanAmount'), 2) }}</strong></td>
            <td><strong>Php {{ number_format($borrower->loans->flatMap->payments->sum('Remaining_Balance'), 2) }}</strong></td>
            <td></td>
        </tr>
    </tbody>
</table>

<h3>Payment History</h3>
<table>
        <thead>
            <tr>
                <th>Payment Date</th>
                <th>Paid Amount</th>
                <th>Reference Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrower->transactionHistories as $transactionHistory)
                <tr>
                    <td>{{ $transactionHistory->PaymentDate ?? '' }}</td>
                    <td>Php {{ number_format($transactionHistory->PaymentAmount ?? 0, 2) }}</td>
                    <td>{{ $transactionHistory->ReferenceNumber ?? '' }}</td>
                </tr>
            @endforeach

            <!-- Total Row -->
            <tr>
                <td colspan="1"><strong>Total</strong></td>
                <td><strong>Php {{ number_format($borrower->transactionHistories->sum('PaymentAmount') ?? 0, 2) }}</strong></td>
                <td></td>
            </tr>
        </tbody>
    </table>


@if ($index < count($borrowers) - 1)
        <hr style="margin: 20px 0; border: 1px solid #00f;">
    @endif
    
@endforeach
<hr style="margin: 20px 0; border: 1px solid #00f;">
<!-- All Total -->
<h3>Total Break Down</h3>

<table>
    <thead>
        <tr>
            <th colspan="">Date Range</th>
            <th>Total Paid Amount</th>
            <th>Total Amount</th>
            <th>Total Balance</th>
            <th>Total Loan Applied</th>
           
        </tr>
    </thead>
    <tbody>
        <tr>
        @php
    list($startDate, $endDate) = explode(' - ', $dateRange);
@endphp
            <td colspan="">{{ \Carbon\Carbon::parse($startDate)->format('M/d/Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('M/d/Y') }}</td>
            <td>Php {{ number_format($totalPaid, 2) }}</td>
            <td>Php {{ number_format($borrowers->flatMap->loans->sum('LoanAmount'), 2) }}</td>
            <td>Php {{ number_format($borrowers->flatMap->loans->flatMap->payments->sum('Remaining_Balance'), 2) }}</td>
            <td>{{$totalLoanApplied}}</td>
            
        </tr>
    </tbody>
</table>
<div style="page-break-before:always">&nbsp;</div> 
<!-- // how to page make this second page -->




<h2>Loan Breakdown Summary</h2>

<table border="1">
    <thead>
        <tr>
            
        </tr>
    </thead>
    <tbody>
       
    </tbody>
</table>

<table>
<thead>
    <tr>
        <th>Monthly</th>
        <th>Total Balance</th>
        <th>Total Paid</th>
        <th>Total Loan Amount</th>
        <th>Total Loan Register</th>
    </tr>
</thead>
<tbody>
    @foreach($selectedMonths as $month)
        <tr>
            <td>{{ $month }}</td>
            <td>{{ $monthlyData[$month]['totalBalance'] ?? 0 }}</td>
            <td>{{ $monthlyData[$month]['totalPaid'] ?? 0 }}</td>
            <td>{{ $monthlyData[$month]['totalLoanAmount'] ?? 0 }}</td>
            <td>{{ $monthlyData[$month]['totalLoanApplied'] ?? 0 }}</td>
        </tr>
    @endforeach
</tbody>

</table>



</table>
</body>
</html>
