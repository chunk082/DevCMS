<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .content {
            padding: 20px;
        }

        .content h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .content p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .content .temp-password {
            background: #f8f9fa;
            border: 1px solid #ddd;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 18px;
            color: #333;
            text-align: center;
        }

        .footer {
            text-align: center;
            color: #888;
            padding: 10px;
            font-size: 14px;
            border-top: 1px solid #ddd;
            background: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Password Reset</h1>
        </div>
        <div class="content">
            <h1>{{ $title }}</h1>
            <p>{{ $body }}</p>
            <p><strong>Temporary Password:</strong></p>
            <p class="temp-password">{{ $tempPassword }}</p>
            <p>Make sure to change this password as soon as you log in.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Dev Hotel. All rights reserved.
        </div>
    </div>
</body>
</html>

