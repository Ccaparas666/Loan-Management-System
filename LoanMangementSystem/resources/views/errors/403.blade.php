<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #1f2937; /* Dark background color */
        }

        .content {
            position: relative;
            text-align: center;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .back-to-home {
            position: absolute;
            top: 75%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px 100px;
            background-color: #3490dc; /* Button color */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-to-home:hover {
            background-color: #2779bd; /* Hover color */
        }
    </style>
</head>
<body>
    <div class="content">
        <img src="https://cdn.dribbble.com/users/2467010/screenshots/13935094/media/0a9817fee5743df30517b29d631a2e29.png" alt="403 image">
        
        <a href="{{ route('dashboard') }}" class="back-to-home text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4 dark:bg-gray-800">Back to Dashboard</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>
