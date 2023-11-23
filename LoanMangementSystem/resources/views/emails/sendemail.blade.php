<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asdasdasd</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <h1>{{ $mailData['body'] }}</h1>
    <p>this is test email only</p>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Loan Application is in Process</title>
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
            background-color: #ffffff; /* Background color inside the container */
        }

        h1 {
            color: black;
            background-color: rgba(135, 212, 235, 0.185);
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
        <h1>Your Loan Application is in Process</h1>
        <p>
            Dear {{ $mailData['BorrowerName'] }}<br>
            We hope this email finds you well. Thank you for choosing LendWise for your financial needs.
        </p>
        
        <p>
            We are pleased to inform you that your loan application is currently in process. Our dedicated team is diligently reviewing the information you provided to ensure a swift and accurate evaluation.
        </p>

        <p>
            <strong>Application Details:</strong><br>
            <strong>Borrower Account Number:</strong> {{ $mailData['accountnumber'] }}<br>
            <strong>Loan Number:</strong>{{ $mailData['loanNumber'] }} <br>
            <strong>Loan Amount:</strong> {{ $mailData['loanAmount'] }}<br>
            <strong>Application Status:</strong> In Process
        </p>

        <!-- <p>
            <strong>Next Steps:</strong><br>
            Our team will carefully assess your application and may reach out to you for any additional information required. Please ensure that you have provided all necessary documentation to expedite the process.
        </p>

        <p>
            <strong>Timeline:</strong><br>
            We understand the importance of a timely response. Rest assured, we are working diligently to process your application as quickly as possible. You can expect an update on the status of your application within the next [provide an estimated timeframe].
        </p>

        <p>
            <strong>Contact Information:</strong><br>
            Should you have any questions or concerns during this process, please feel free to contact our customer support team at [Your Customer Support Email/Phone Number]. Our representatives are ready to assist you.
        </p>

        <p>
            We appreciate your trust in [Your Company Name], and we look forward to the opportunity to support your financial goals. Thank you for choosing us as your financial partner.
        </p> -->

        <!-- <a href="[Your Website URL]" class="btn btn-primary">Visit Our Website</a> -->
    </div>
</body>
</html>
