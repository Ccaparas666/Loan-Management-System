<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Loan Application Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            font-size: 18px;
        }

        #container {
            max-width: 600px;
            margin: 20px auto;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        h1 {
            color: #007BFF;
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        p {
            line-height: 1.6;
            color: #555;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            margin-top: 30px;
            text-decoration: none;
            background-color: #007BFF;
            color: #fff;
            border-radius: 8px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #0056b3;
        }


        table {
            border-collapse: collapse;
            width: 100%;
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

        .in-process {
            background-color: #0249b4;
            /* Blue color for "In Process" status */
            color: #fff;
            /* White text on the blue background */
            font-weight: bold;
            padding: 8px;
            border-radius: 5px;
        }

        .approved-status {
            background-color: #28a745;
            color: #fff;
            font-weight: bold;
            padding: 8px;
            border-radius: 5px;
        }


        .loan-active-status {
            background-color: #FFA500;
            color: #fff;
            font-weight: bold;
            padding: 8px;
            border-radius: 5px;
        }

        /* Add or modify styles for Paid (green) */
        .paid-status {
            background-color: #28a745;
            color: #fff;
            font-weight: bold;
            padding: 8px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div id="container" class="bg-light p-4">
        <h1>Your Loan Application Status</h1>
        <p>
            Dear {{ $mailData['BorrowerName'] }},<br>
            We hope this email finds you well. Thank you for choosing LendWise for your financial needs.
        </p>
        @if ($mailData['emailType'] === 'PaymentReceipt')
        <p>
            We acknowledge receipt of your recent payment for your loan with LendWise. Your timely payment is greatly
            appreciated!
        </p>
        <table border="1">
            <tr>
                <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Payment Details:</strong></td>
            </tr>
            <tr>
                <td><strong>Borrower Name:</strong></td>
                <td>{{ $mailData['BorrowerName'] }}</td>
            </tr>
            <tr>
                <td><strong>Account Number:</strong></td>
                <td>{{ $mailData['accountnumber'] }}</td>
            </tr>
            <tr>
                <td><strong>Loan Number:</strong></td>
                <td>{{ $mailData['loanNumber'] }}</td>
            </tr>
            <tr>
                <td><strong>Interest Rate:</strong></td>
                <td>{{ rtrim(rtrim(number_format($mailData['InterestRate'], 2), '0'), '.') }}%</td>
                
            </tr>
            <tr>
                <td><strong>Payment Reference Number:</strong></td>
                <td>{{ $mailData['ReferenceNumber'] }}</td>
            </tr>
            <tr>
                <td><strong>Payment Amount:</strong></td>
                <td>PHP {{ $mailData['paymentAmount'] }}</td>
            </tr>

            @if ($mailData['remainingBalance'] <= 0) @else <tr>
                <td><strong>Due Date:</strong></td>
                <td>{{ \Carbon\Carbon::parse($mailData['due_date'])->format('M-d-Y') }}</td>
                </tr>
                @endif
                <tr>
                    <td><strong>Remaining Balance:</strong></td>
                    <td>PHP {{ $mailData['remainingBalance'] }}</td>
                </tr>
                <tr>
                    <td><strong>Payment Date:</strong></td>
                    <td>{{ \Carbon\Carbon::parse($mailData['paymentDate'])->format('M-d-Y g:i A') }}</td>
                </tr>
                <tr>
                    <td><strong>Loan Status:</strong></td>
                    <td
                        class="{{ $mailData['loanStatus'] === 'Loan Active' ? 'loan-active-status' : ($mailData['loanStatus'] === 'PAID' ? 'paid-status' : '') }}">
                        {{ $mailData['loanStatus'] }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Co-Maker Details:</strong>
                    </td>
                </tr>
                <tr>
                    <td><strong>Name:</strong></td>
                    <td>{{ $mailData['Comaker'] }}</td>
                </tr>
                <tr>
                    <td><strong>Contact Number:</strong></td>
                    <td>{{ $mailData['cmContact'] }}</td>
                </tr>
                <tr>
                    <td><strong>Email Address:</strong></td>
                    <td>{{ $mailData['cmEmail'] }}</td>
                </tr>
                <tr>
                    <td><strong>Address:</strong></td>
                    <td>{{ $mailData['cmAddress'] }}</td>
                </tr>
        </table>

        @if ($mailData['remainingBalance'] <= 0) <p>Congratulations! Your loan is fully paid.</p>
            @else
            <p>Please note that there is still a remaining balance of PHP {{ $mailData['remainingBalance'] }}.</p>
            @endif
            @endif

            @if ($mailData['loanStatus'] === 'In Process')

            <p>
                We are pleased to inform you that your loan application is currently in process. Our dedicated team is
                diligently reviewing the information you provided to ensure a swift and accurate evaluation.
            </p>
            <table border="1">

                <tr>
                    <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Application
                            Details:</strong></td>
                </tr>
                <tr>
                    <td><strong>Borrower Account Number:</strong></td>
                    <td>{{ $mailData['accountnumber'] }}</td>
                </tr>
                <tr>
                    <td><strong>Loan Number:</strong></td>
                    <td>{{ $mailData['loanNumber'] }}</td>
                </tr>
                <tr>
                    <td><strong>Loan Amount:</strong></td>
                    <td>PHP {{ $mailData['loanAmount'] }}</td>
                </tr>
                <tr>
                    <td><strong>Interest Rate:</strong></td>
                    <td>{{ $mailData['InterestRate'] }}%</td>
                </tr>
                <tr>
                    <td><strong>Loan Balance:</strong></td>
                    <td>PHP {{ $mailData['LoanBalance'] }}</td>
                </tr>
                <tr>
                    <td><strong>Loan Status:</strong></td>
                    <td class="in-process">{{ $mailData['loanStatus'] }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Co-Maker Details:</strong>
                    </td>
                </tr>
                <tr>
                    <td><strong>Name:</strong></td>
                    <td>{{ $mailData['Comaker'] }}</td>
                </tr>
                <tr>
                    <td><strong>Contact Number:</strong></td>
                    <td>{{ $mailData['cmContact'] }}</td>
                </tr>
                <tr>
                    <td><strong>Email Address:</strong></td>
                    <td>{{ $mailData['cmEmail'] }}</td>
                </tr>
                <tr>
                    <td><strong>Address:</strong></td>
                    <td>{{ $mailData['cmAddress'] }}</td>
                </tr>
            </table>

            @endif
            @if ($mailData['loanStatus'] === 'Approved')
            <p>
                Good news! Your loan application is approved. Visit our office at
                <a href="https://maps.app.goo.gl/yp9kkhiKJQySbN49A" target="_blank"
                    style="color: #007BFF; text-decoration: underline;">
                    Zone 8, Zayas Lourdes College
                </a> for further details and to collect the funds from your approved loan.
            </p>
            <table border="1">
                <tr>
                    <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Application
                            Details:</strong></td>
                </tr>
                <tr>
                    <td><strong>Borrower Account Number:</strong></td>
                    <td>{{ $mailData['accountnumber'] }}</td>
                </tr>
                <tr>
                    <td><strong>Loan Number:</strong></td>
                    <td>{{ $mailData['loanNumber'] }}</td>
                </tr>
                <tr>
                    <td><strong>Loan Amount:</strong></td>
                    <td>PHP {{ $mailData['loanAmount'] }}</td>
                </tr>
                <tr>
                    <td><strong>Interest Rate:</strong></td>
                    <td>{{ rtrim(rtrim(number_format($mailData['InterestRate'], 2), '0'), '.') }}%</td>
                </tr>
                <tr>
                    <td><strong>Loan Balance:</strong></td>
                    <td>PHP {{ $mailData['LoanBalance'] }}</td>
                </tr>
                <tr>
                    <td><strong>Loan Status:</strong></td>
                    <td class="approved-status">{{ $mailData['loanStatus'] }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Co-Maker Details:</strong>
                    </td>
                </tr>
                <tr>
                    <td><strong>Name:</strong></td>
                    <td>{{ $mailData['Comaker'] }}</td>
                </tr>
                <tr>
                    <td><strong>Contact Number:</strong></td>
                    <td>{{ $mailData['cmContact'] }}</td>
                </tr>
                <tr>
                    <td><strong>Email Address:</strong></td>
                    <td>{{ $mailData['cmEmail'] }}</td>
                </tr>
                <tr>
                    <td><strong>Address:</strong></td>
                    <td>{{ $mailData['cmAddress'] }}</td>
                </tr>
            </table>

            <p>
                <strong>Due Date Reminder:</strong><br>
                Your loan payment is scheduled to start on the cash release date. Please make sure to mark the due dates
                on your calendar and ensure sufficient funds are available in your account.
            </p>

            @endif
            @if ($mailData['loanStatus'] === 'Rejected')
            <p style="margin-top: 20px;">
                We regret to inform you that your loan application has been rejected. If you have any questions or need
                further assistance, feel free to visit our office at:
                <br>
                <a href="https://maps.app.goo.gl/yp9kkhiKJQySbN49A" target="_blank"
                    style="color: #007BFF; text-decoration: underline;">
                    Zone 8, Zayas Lourdes College
                </a>.
            </p>
            <table border="1">
                <tr>
                    <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Application
                            Details:</strong></td>
                </tr>
                <tr>
                    <td><strong>Borrower Account Number:</strong></td>
                    <td>{{ $mailData['accountnumber'] }}</td>
                </tr>
                <tr>
                    <td><strong>Loan Number:</strong></td>
                    <td>{{ $mailData['loanNumber'] }}</td>
                </tr>

                <tr>
                    <td><strong>Loan Amount:</strong></td>
                    <td>PHP {{ $mailData['loanAmount'] }}</td>
                </tr>
             
                <td>{{ rtrim(rtrim(number_format($mailData['InterestRate'], 2), '0'), '.') }}%</td>
                <tr>
                    <td><strong>Loan Status:</strong></td>
                    <td style="background-color: #ff3333; color: #fff;">{{ $mailData['loanStatus'] }}</td>
                </tr>
                <tr>
                    <td><strong>Reason for Rejection:</strong></td>
                    <td>{{ $mailData['Reason'] }}</td>
                </tr>
            </table>
            @endif
            @if ($mailData['emailType'] === 'PaymentReminder')

            <p>
                This is a friendly reminder about the latest update on your loan with LendWise.
            </p>
            <table border="1">
                <tr>
                    <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Loan Update Details:</strong></td>
                </tr>
                <tr>
                    <td><strong>Borrower Name:</strong></td>
                    <td>{{ $mailData['BorrowerName'] }}</td>
                </tr>
                <tr>
                    <td><strong>Account Number:</strong></td>
                    <td>{{ $mailData['accountnumber'] }}</td>
                </tr>
                <tr>
                    <td><strong>Loan Number:</strong></td>
                    <td>{{ $mailData['loanNumber'] }}</td>
                </tr>
                <tr>
                    <td><strong>Interest Rate:</strong></td>
                    <td>{{ rtrim(rtrim(number_format($mailData['InterestRate'], 2), '0'), '.') }}%</td>
                </tr>
                <tr>
                    <td><strong>Balance:</strong></td>
                    <td>PHP {{ number_format($mailData['LoanBalance'], 2) }}</td>
                </tr>
                <tr>
                    <td><strong>Due Balance Added:</strong></td>
                    <td>{{ $mailData['BalanceAdded'] }}</td>
                </tr>
                <tr>
                    <td><strong>New Balance:</strong></td>
                    <td>PHP {{ number_format($mailData['remainingBalance'], 2) }}</td>
                </tr>
                <tr>
                    <td><strong>Due Date:</strong></td>
                    <td>{{ \Carbon\Carbon::parse($mailData['dueDate'])->format('M-d-Y') }}</td>
                </tr>
                <tr>
                    <td><strong>New Due Date:</strong></td>
                    <td>{{ \Carbon\Carbon::parse($mailData['updateDue'])->format('M-d-Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Loan Status:</strong></td>
                    <td style="background-color: #0F985C; color: #fff;">{{ $mailData['loanstatus'] }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Co-Maker Details:</strong></td>
                </tr>
                <tr>
                    <td><strong>Name:</strong></td>
                    <td>{{ $mailData['Comaker'] }}</td>
                </tr>
                <tr>
                    <td><strong>Contact Number:</strong></td>
                    <td>{{ $mailData['cmContact'] }}</td>
                </tr>
                <tr>
                    <td><strong>Email Address:</strong></td>
                    <td>{{ $mailData['cmEmail'] }}</td>
                </tr>
                <tr>
                    <td><strong>Address:</strong></td>
                    <td>{{ $mailData['cmAddress'] }}</td>
                </tr>
            </table>



            @endif

            <p style="margin-top: 20px;">
                If you have any questions or need further assistance, please visit our office at
                <a href="https://maps.app.goo.gl/yp9kkhiKJQySbN49A" target="_blank"
                    style="color: #007BFF; text-decoration: underline;">
                    Zone 8, Zayas Lourdes College
                </a>.
            </p>
    </div>
</body>

</html>