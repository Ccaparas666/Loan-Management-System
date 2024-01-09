<!DOCTYPE html>
<html>
<head>
    <title>Loan Report</title>
    <style>
        /* Add your custom styles for the report here */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Loan Report</h2>
    <table>
        <thead>
            <tr>
                <th>Loan Number</th>
                <th>Borrower Name</th>
                <th>Loan Amount</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $loan)
                <tr>
                    <td>{{ $loan->loanNumber }}</td>
                    <td>{{ $loan->borrowerinfo->borFname }} {{ $loan->borrowerinfo->borLname }}</td>
                    <td>{{ $loan->LoanAmount }}</td>
                    <!-- Add more cells as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>

    
</body>
</html>
