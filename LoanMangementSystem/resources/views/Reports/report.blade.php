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




<h1 style="text-align: center; color: #3498db;">Loan Breakdown Summary</h1>
<table>
    <thead>
        <tr>
            <th>Monthly</th>
            <th>Total Balance</th>
            <th>Total Paid</th>
            <th>Total Loan Amount</th>
            <th>Loan Registered</th>
            <th>Borrower's</th>
        </tr>
    </thead>
    <tbody>
        @foreach($selectedMonths as $month)
            <tr>
                <td>{{ $month }}</td>
                <td>Php {{ number_format($monthlyData[$month]['totalBalance'] ?? 0, 2) }}</td>
                <td>Php {{ number_format($monthlyData[$month]['totalPaid'] ?? 0, 2) }}</td>
                <td>Php {{ number_format($monthlyData[$month]['totalLoanAmount'] ?? 0, 2) }}</td>
                <td>{{ $monthlyData[$month]['loanRegistered'] ?? 0 }}</td>
                <td>{{ $monthlyData[$month]['borrowers'] ?? 0 }}</td>
            </tr>
        @endforeach

        <!-- TOTAL ALL  -->
        <tr>
            <td class="total-cell"><strong>Total</strong></td>
            <td class="total-cell"><strong>Php {{ number_format($monthlyData['Total']['totalBalance'], 2) }}</strong></td>
            <td class="total-cell"><strong>Php {{ number_format($monthlyData['Total']['totalPaid'], 2) }}</strong></td>
            <td class="total-cell"><strong>Php {{ number_format($monthlyData['Total']['totalLoanAmount'], 2) }}</strong></td>
            <td class="total-cell"><strong>{{ $monthlyData['Total']['loanRegistered'] }}</strong></td>
            <td class="total-cell"><strong>{{ $monthlyData['Total']['borrowers'] }}</strong></td>
        </tr>
    </tbody>
</table>








</body>
</html>

