<!DOCTYPE html>
<html>
<head>
    <title>Contact Us Information</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #f4f4f4;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        .content {
            padding: 20px;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .info-item label {
            font-weight: bold;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Contact Us Information</h2>
        </div>
        <div class="content">
            <div class="info-item">
                <label>First Name:</label>
                <span>{{ $fname }}</span>
            </div>
            <div class="info-item">
                <label>Last Name:</label>
                <span>{{ $lname }}</span>
            </div>
            <div class="info-item">
                <label>Phone Number:</label>
                <span>{{ $phonenumber }}</span>
            </div>
            <div class="info-item">
                <label>Email:</label>
                <span>{{ $email }}</span>
            </div>
            <div class="info-item">
                <label>Street Number:</label>
                <span>{{ $streetnumber }}</span>
            </div>
            <div class="info-item">
                <label>Postal Code and City:</label>
                <span>{{ $pcodeandc }}</span>
            </div>
            <div class="info-item">
                <label>Occupation:</label>
                <span>{{ $iam }}</span>
            </div>
            <div class="info-item">
                <label>Project:</label>
                <span>{{ $project }}</span>
            </div>
            <div class="info-item">
                <label>Message:</label>
                <span>{{ $emailMessage }}</span>
            </div>
            
        </div>
    </div>
</body>
</html>
