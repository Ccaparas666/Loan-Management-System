<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Summary</title>
    <style>
        * {
            font-family: DejaVu Sans, sans-serif;
            
        }

      

        body {
            font-size: 12px;
            background-image: url('https://img.freepik.com/free-photo/blue-abstract-gradient-wave-wallpaper_53876-108364.jpg'); /* Replace with the path to your background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
           
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
            /* Light gray for even rows */
        }

        tbody tr:nth-child(odd) {
            background-color: #ffffff;
            /* White for odd rows */
        }

        td strong {
            /* Dark blue or any other color you choose */
            font-weight: bold;
        }

        td.total-cell {
            background-color: rgba(200, 200, 200, 0.9);
            /* Slightly dark background color for total cells */
            /* Text color for total cells on dark background */
            color: #333;
        }
    </style>
</head>
<body>

<h1 style="text-align: center; color: #3498db;">LendWise</h1>
    <h2 style="text-align: center;">Borrowers Summary</h2>

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
            <td colspan="" >{{ \Carbon\Carbon::parse($startDate)->format('M/d/Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('M/d/Y') }}</td>
            <td >Php {{ number_format($totalPaid, 2) }}</td>
            <td >Php {{ number_format($borrowers->flatMap->loans->sum('LoanAmount'), 2) }}</td>
            <td >Php {{ number_format($borrowers->flatMap->loans->flatMap->payments->sum('Remaining_Balance'), 2) }}</td>
            <td >{{$totalLoanApplied}}</td>
            
        </tr>
    </tbody>
</table>
<div style="page-break-before:always">&nbsp;</div> 
<!-- // how to page make this second page -->




<h1 style="text-align: center; color: #3498db;">Loan Breakdown Summary</h1>

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
        <th>Total Borrowers</th>
    </tr>
</thead>
<tbody>
@php
        $grandTotal = [
            'totalBalance' => 0,
            'totalPaid' => 0,
            'totalLoanAmount' => 0,
            'totalLoanApplied' => 0,
            'totalBorrower' => 0,
        ];
    @endphp
    @foreach($selectedMonths as $month)
        <tr>
            <td>{{ $month }}</td>
            <td>Php {{ $monthlyData[$month]['totalBalance'] ?? 0 }}</td>
            <td>Php {{ $monthlyData[$month]['totalPaid'] ?? 0 }}</td>
            <td>Php {{ $monthlyData[$month]['totalLoanAmount'] ?? 0 }}</td>
            <td>{{ $monthlyData[$month]['totalLoanApplied'] ?? 0 }}</td>
            <td>{{ $monthlyData[$month]['totalBorrower'] ?? 0 }}</td>
        </tr>

        @php
            $grandTotal['totalBalance'] += $monthlyData[$month]['totalBalance'] ?? 0;
            $grandTotal['totalPaid'] += $monthlyData[$month]['totalPaid'] ?? 0;
            $grandTotal['totalLoanAmount'] += $monthlyData[$month]['totalLoanAmount'] ?? 0;
            $grandTotal['totalLoanApplied'] += $monthlyData[$month]['totalLoanApplied'] ?? 0;
            $grandTotal['totalBorrower'] += $monthlyData[$month]['totalBorrower'] ?? 0;
        @endphp
    @endforeach
<!-- TOTAL ALL  -->
        <tr>
            <td class="total-cell"><strong>Total</strong></td>
            <td class="total-cell"><strong>Php {{ $grandTotal['totalBalance']}}</strong></td>
            <td class="total-cell"><strong>Php {{ $grandTotal['totalPaid'] }}</strong></td>
            <td class="total-cell"><strong>Php {{ $grandTotal['totalLoanAmount'] }}</strong></td>
            <td class="total-cell"><strong>{{ $grandTotal['totalLoanApplied'] }}</strong></td>
            <td class="total-cell"><strong>{{ $grandTotal['totalBorrower'] }}</strong></td>
        </tr>
</tbody>

</table>



</table>
</body>
</html>

