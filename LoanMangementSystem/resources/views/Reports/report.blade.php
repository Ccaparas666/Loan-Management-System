<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Summary</title>
</head>
<body>
   <!-- Reports/myPDF.blade.php -->

<!-- Use $borrowers instead of $borrower -->
@foreach($borrowers as $borrower)
    <p>{{ $borrower->borFname }} {{ $borrower->borLname }}</p>
    <!-- Add your borrower information display here -->
    <!-- Example: -->
    <ul>
        <li>Borrower's name: {{ $borrower->borFname }} {{ $borrower->borLname }}</li>
        <li>Borrower's contact details: {{ $borrower->borContact }}</li>
        <!-- Add more details as needed -->
    </ul>

    <!-- Display loans for this borrower -->
    @foreach($borrower->loans as $loan)
        <p>{{ $loan->loanNumber }} - Loan Amount: PHP {{ number_format($loan->LoanAmount, 2) }}</p>
        <!-- Add your loan information display here -->
        <!-- Example: -->
        <ul>
            <li>Loan Number: {{ $loan->loanNumber }}</li>
            <li>Loan Amount: PHP {{ number_format($loan->LoanAmount, 2) }}</li>
            <!-- Add more loan details as needed -->
        </ul>

        <!-- Display payments for this loan -->
        @foreach($loan->payments as $payment)
            <p>Payment - Remaining Balance: PHP {{ number_format($payment->Remaining_Balance, 2) }}</p>
            <!-- Add your payment information display here -->
            <!-- Example: -->
            <ul>
                <li>Remaining Balance: PHP {{ number_format($payment->Remaining_Balance, 2) }}</li>
                <li>Due Date: {{ $payment->due_date }}</li>
                <!-- Add more payment details as needed -->
            </ul>
        @endforeach
    @endforeach
@endforeach

<table border="1">
    <thead>
        <tr>
            <th>Loan Number</th>
            <th>Borrower Name</th>
            <th>Remaining Balance</th>
            <th>Next Due Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($borrowers as $borrower)
            @foreach($borrower->loans as $loan)
                @if($loan->loanstatus === 'active') <!-- Assuming 'active' is the status for an active loan -->
                    <tr>
                        <td>{{ $loan->loanNumber }}</td>
                        <td>{{ $borrower->borFname }} {{ $borrower->borLname }}</td>
                        <td>PHP {{ number_format(optional($loan->payments->last())->Remaining_Balance ?? 0, 2) }}</td>
                        <td>{{ optional($loan->payments->last())->due_date ?? 'N/A' }}</td>
                    </tr>
                @endif
            @endforeach
        @endforeach
    </tbody>
</table>

<!-- Table showing payment history for each loan -->
<h2>Payment History</h2>

@foreach($borrowers as $borrower)
    @foreach($borrower->loans as $loan)
        <h3>Loan Number: {{ $loan->loanNumber }}</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>Payment Date</th>
                    <th>Payment Amount</th>
                    <th>Remaining Balance</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loan->payments as $payment)
                    <tr>
                        <td>{{ $payment->due_date }}</td>
                        <td>PHP {{ number_format($payment->PaymentAmount, 2) }}</td>
                        <td>PHP {{ number_format($payment->Remaining_Balance, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
@endforeach

<!-- Reports/myPDF.blade.php -->

<!-- Loan Summary -->
<h2>Loan Summary</h2>

<!-- Total Number of Loans -->
<p>Total Number of Loans: {{ $borrowers->flatMap->loans->count() }}</p>

<!-- Total Loan Balance -->
<p>Total Loan Balance: PHP {{ number_format($borrowers->flatMap->loans->flatMap->payments->sum('Remaining_Balance'), 2) }}</p>

<!-- Average Loan Amount -->
<p>Average Loan Amount: PHP {{ number_format($borrowers->flatMap->loans->avg('LoanAmount'), 2) }}</p>

<!-- Highest Loan Amount -->
<p>Highest Loan Amount: PHP {{ number_format($borrowers->flatMap->loans->max('LoanAmount'), 2) }}</p>

<!-- Lowest Loan Amount -->
<p>Lowest Loan Amount: PHP {{ number_format($borrowers->flatMap->loans->min('LoanAmount'), 2) }}</p>

<!-- Loan Status Breakdown -->
<h3>Loan Status Breakdown</h3>
<ul>
    @foreach($borrowers->flatMap->loans->groupBy('loanstatus') as $status => $statusLoans)
        <li>{{ $status }}: {{ $statusLoans->count() }} loans</li>
    @endforeach
</ul>


    <h1>Important Dates:</h1>
    <!-- Relevant dates go here -->

    <h1>Graphs or Charts (optional):</h1>
    <!-- Visualization goes here -->

    <h1>Terms and Conditions:</h1>
    <!-- Terms and conditions go here -->

    <h1>Contact Information:</h1>
    <!-- Contact information goes here -->

    <footer>
        <!-- Footer content goes here -->
    </footer>
</body>
</html>
