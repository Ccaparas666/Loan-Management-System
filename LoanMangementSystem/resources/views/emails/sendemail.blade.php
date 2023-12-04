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
    </style>
</head>

<body>
    <div id="container" class="bg-light p-4">
        <h1>Your Loan Application Status</h1>
        <p>
            Dear {{ $mailData['BorrowerName'] }}<br>
            We hope this email finds you well. Thank you for choosing LendWise for your financial needs.
        </p>

        @if ($mailData['loanStatus'] === 'In Process')
        <p>
            We are pleased to inform you that your loan application is currently in process. Our dedicated team is
            diligently reviewing the information you provided to ensure a swift and accurate evaluation.
        </p>
        <p>
            <strong>Application Details:</strong><br>
            <strong>Borrower Account Number:</strong> {{ $mailData['accountnumber'] }}<br>
            <strong>Loan Number:</strong>{{ $mailData['loanNumber'] }} <br>
            <strong>Loan Amount:</strong> {{ $mailData['loanAmount'] }}<br>
            <strong>Application Status:</strong> {{ $mailData['loanStatus'] }}
        </p>
        @elseif ($mailData['loanStatus'] === 'Approved')
        <p>
            Congratulations! Your loan application has been approved. You can expect further instructions and details
            regarding your approved loan shortly.
        </p>
        <p>
            <strong>Application Details:</strong><br>
            <strong>Borrower Account Number:</strong> {{ $mailData['accountnumber'] }}<br>
            <strong>Loan Number:</strong>{{ $mailData['loanNumber'] }} <br>
            <strong>Loan Amount:</strong> {{ $mailData['loanAmount'] }}<br>
            <strong>Application Status:</strong> {{ $mailData['loanStatus'] }}
        </p>
        @elseif ($mailData['loanStatus'] === 'Rejected')
        <p>
            We regret to inform you that your loan application has been rejected. If you have any questions or concerns,
            please contact our customer support for assistance.
        </p>
        <p>
            <strong>Application Details:</strong><br>
            <strong>Borrower Account Number:</strong> {{ $mailData['accountnumber'] }}<br>
            <strong>Loan Number:</strong>{{ $mailData['loanNumber'] }} <br>
            <strong>Loan Amount:</strong> {{ $mailData['loanAmount'] }}<br>
            <strong>Application Status:</strong> {{ $mailData['loanStatus'] }}
        </p>
        @elseif ($mailData['emailType'] === 'PaymentReminder')

        <p>
            This is a friendly reminder about the latest update on your loan with LendWise.
        </p>
        <p>
            <strong>Loan Details:</strong><br>
            <strong>Borrower Name:</strong> {{ $mailData['BorrowerName'] }}<br>
            <strong>Account Number:</strong> {{ $mailData['accountnumber'] }}<br>
            <strong>Loan Number:</strong> {{ $mailData['loanNumber'] }}<br>
            <strong>Loan Amount:</strong> {{ $mailData['loanAmount'] }}<br>
            <strong>Remaining Balance:</strong> {{ $mailData['remainingBalance'] }}<br>
            <strong>Due Date:</strong> {{ $mailData['dueDate'] }}<br>
        </p>
        @endif


    </div>
</body>

</html>