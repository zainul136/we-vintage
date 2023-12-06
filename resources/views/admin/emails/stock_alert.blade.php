<!DOCTYPE html>
<html>

<head>
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ee1d1d;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
        }

        .contact-info {
            margin-top: 20px;
            font-size: 14px;
            color: #777777;
        }

        .contact-info strong {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>{{ $subject }}</h1>
        <p>{{ $alertMessage }}</p>
        <p>Contact {{ getSupplierName($supplier) }} to reorder the part.</p>
    </div>
</body>

</html>
