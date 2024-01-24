<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Co-Maker Invitation</title>
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
        @if ($sendCoMaker['emailType'] === 'LoanApply')
        <h1>Co-Maker Invitation</h1>
        <p>
            Dear {{ $sendCoMaker['Comaker'] }},<br>
            You have been added as a co-maker for a loan application with LendWise by {{ $sendCoMaker['BorrowerName'] }}.
        </p>
        <table border="1">
            <tr>
                <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Application Details:</strong>
                </td>
            </tr>
            <tr>
                <td><strong>Borrower Account Number:</strong></td>
                <td>{{ $sendCoMaker['accountnumber'] }}</td>
            </tr>
            <tr>
                <td><strong>Loan Number:</strong></td>
                <td>{{ $sendCoMaker['loanNumber'] }}</td>
            </tr>
            <tr>
                <td><strong>Borrower Name:</strong></td>
                <td>{{ $sendCoMaker['BorrowerName'] }}</td>
            </tr>
            <tr>
                <td><strong>Borrower Contact Number:</strong></td>
                <td>{{ $sendCoMaker['BorrowerContact'] }}</td>
            </tr>
            <tr>
                <td><strong>Borrower Email Address:</strong></td>
                <td>{{ $sendCoMaker['BorrowerEmail'] }}</td>
            </tr>
            <tr>
                <td><strong>Borrower Address:</strong></td>
                <td>{{ $sendCoMaker['BorrowerAddress'] }}</td>
            </tr>
            <tr>
                <td><strong>Loan Amount:</strong></td>
                <td>PHP {{ number_format($sendCoMaker['loanAmount'], 2) }}</td>
            </tr>
            <tr>
                <td><strong>Interest Rate:</strong></td>
                <td>{{ $sendCoMaker['InterestRate'] }}%</td>
            </tr>
            <tr>
                <td><strong>Loan Balance:</strong></td>
                <td>PHP {{ number_format($sendCoMaker['LoanBalance'], 2) }}</td>
            </tr>
            <tr>
                <td><strong>Loan Status:</strong></td>
                <td class="in-process">{{ $sendCoMaker['loanStatus'] }}</td>
            </tr>
            <tr>
                <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Co-Maker Details:</strong>
                </td>
            </tr>
            <tr>
                <td><strong>Name:</strong></td>
                <td>{{ $sendCoMaker['Comaker'] }}</td>
            </tr>
            <tr>
                <td><strong>Contact Number:</strong></td>
                <td>{{ $sendCoMaker['cmContact'] }}</td>
            </tr>
            <tr>
                <td><strong>Email Address:</strong></td>
                <td>{{ $sendCoMaker['cmEmail'] }}</td>
            </tr>
            <tr>
                <td><strong>Address:</strong></td>
                <td>{{ $sendCoMaker['cmAddress'] }}</td>
            </tr>
        </table>

        <p>
            If you have any questions or concerns, please contact the borrower at {{ $sendCoMaker['BorrowerEmail'] }}.
        </p>
        @elseif ($sendCoMaker['emailType'] === 'LoanUpdate')
        <h1>Loan Update Reminder</h1>
        <p>
            Dear {{ $sendCoMaker['Comaker'] }},
            <br>
            This is a friendly reminder that the loan for the borrower, {{ $sendCoMaker['BorrowerName'] }},
            is due for payment. The loan details are as follows:
        </p>


        <table border="1">
            <tr>
                <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Loan Update Details:</strong>
                </td>
            </tr>
            <tr>
                <td><strong>Borrower Name:</strong></td>
                <td>{{ $sendCoMaker['BorrowerName'] }}</td>
            </tr>
            <tr>
                <td><strong>Borrower Contact:</strong></td>
                <td>{{ $sendCoMaker['BorrowerContact'] }}</td>
            </tr>
            <tr>
                <td><strong>Borrower Email:</strong></td>
                <td>{{ $sendCoMaker['BorrowerEmail'] }}</td>
            </tr>
            <tr>
                <td><strong>Borrower Address:</strong></td>
                <td>{{ $sendCoMaker['BorrowerAddress'] }}</td>
            </tr>
            <tr>
                <td><strong>Interest Rate:</strong></td>
                <td>{{ rtrim(rtrim(number_format($sendCoMaker['InterestRate'], 2), '0'), '.') }}%</td>
            </tr>
            <tr>
                <td><strong>Loan Balance:</strong></td>
                <td>PHP {{ $sendCoMaker['LoanBalance'] }}</td>
            </tr>
            <tr>
                <td><strong>Balance Added:</strong></td>
                <td>{{ $sendCoMaker['BalanceAdded'] }}</td>
            </tr>
            <tr>
                <td><strong>Remaining Balance:</strong></td>
                <td>PHP {{ $sendCoMaker['remainingBalance'] }}</td>
            </tr>
            <tr>
                <td><strong>Due Date:</strong></td>
                <td>{{ \Carbon\Carbon::parse($sendCoMaker['dueDate'])->format('M-d-Y') }}</td>
            </tr>
            <tr>
                <td><strong>Updated Due Date:</strong></td>
                <td>{{ \Carbon\Carbon::parse($sendCoMaker['updateDue'])->format('M-d-Y') }}</td>
            </tr>
            <tr>
                <td><strong>Loan Status:</strong></td>
                <td
                    class="{{ $sendCoMaker['loanStatus'] === 'Loan Active' ? 'loan-active-status' : ($sendCoMaker['loanStatus'] === 'PAID' ? 'paid-status' : '') }}">
                    {{ $sendCoMaker['loanStatus'] }}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Co-Maker Details:</strong>
                </td>
            </tr>
            <tr>
                <td><strong>Co-Maker:</strong></td>
                <td>{{ $sendCoMaker['Comaker'] }}</td>
            </tr>
            <tr>
                <td><strong>Co-Maker's Contact:</strong></td>
                <td>{{ $sendCoMaker['cmContact'] }}</td>
            </tr>
            <tr>
                <td><strong>Co-Maker's Email:</strong></td>
                <td>{{ $sendCoMaker['cmEmail'] }}</td>
            </tr>
            <tr>
                <td><strong>Co-Maker's Address:</strong></td>
                <td>{{ $sendCoMaker['cmAddress'] }}</td>
            </tr>
        </table>

        @elseif ($sendCoMaker['emailType'] === 'LoanRemind')
        <h1>Loan Reminder</h1>
        <p>
            Dear {{ $sendCoMaker['Comaker'] }},
            <br>
            We hope this message finds you well. We want to remind you that the borrower, {{
            $sendCoMaker['BorrowerName'] }}, for whom you are a co-maker, has a loan with a due date coming up soon.
        </p>
        <p><strong>Here are some important details:</strong></p>
        <table border="1">
            <tr>
                <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Loan Update Details:</strong>
                </td>
            </tr>
            <tr>
                <td><strong>Borrower Name:</strong></td>
                <td>{{ $sendCoMaker['BorrowerName'] }}</td>
            </tr>
            <tr>
                <td><strong>Account Number:</strong></td>
                <td>{{ $sendCoMaker['accountnumber'] }}</td>
            </tr>
            <tr>
                <td><strong>Loan Status:</strong></td>
                <td
                    class="{{ $sendCoMaker['loanstatus'] === 'Loan Active' ? 'loan-active-status' : ($sendCoMaker['loanstatus'] === 'PAID' ? 'paid-status' : '') }}">
                    {{ $sendCoMaker['loanstatus'] }}
                </td>
            </tr>
            <tr>
                <td><strong>Borrower Contact:</strong></td>
                <td>{{ $sendCoMaker['BorrowerContact'] }}</td>
            </tr>
            <tr>
                <td><strong>Borrower Email:</strong></td>
                <td>{{ $sendCoMaker['BorrowerEmail'] }}</td>
            </tr>
            <tr>
                <td><strong>Borrower Address:</strong></td>
                <td>{{ $sendCoMaker['BorrowerAddress'] }}</td>
            </tr>
            <tr>
                <td><strong>Interest Rate:</strong></td>
                <td>{{ rtrim(rtrim(number_format($sendCoMaker['InterestRate'], 2), '0'), '.') }}%</td>
            </tr>
            <tr>
                <td><strong>Loan Balance:</strong></td>
                <td>PHP {{ $sendCoMaker['LoanBalance'] }}</td>
            </tr>
            <tr>
                <td><strong>Due Date:</strong></td>
                <td>{{ \Carbon\Carbon::parse($sendCoMaker['dueDate'])->format('M-d-Y') }}</td>
            </tr>

            <tr>
                <td colspan="2" style="background-color: #0d71b4fd; color: #fff;"><strong>Co-Maker Details:</strong>
                </td>
            </tr>
            <tr>
                <td><strong>Co-Maker:</strong></td>
                <td>{{ $sendCoMaker['Comaker'] }}</td>
            </tr>
            <tr>
                <td><strong>Co-Maker's Contact:</strong></td>
                <td>{{ $sendCoMaker['cmContact'] }}</td>
            </tr>
            <tr>
                <td><strong>Co-Maker's Email:</strong></td>
                <td>{{ $sendCoMaker['cmEmail'] }}</td>
            </tr>
            <tr>
                <td><strong>Co-Maker's Address:</strong></td>
                <td>{{ $sendCoMaker['cmAddress'] }}</td>
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
        <p>
            you can also reach us at:
        </p>
        <p>
            <strong>Phone:</strong> <a href="#" style="color: #007BFF; text-decoration: underline;">0912 234 5678</a>
        </p>
    </div>
</body>

</html>