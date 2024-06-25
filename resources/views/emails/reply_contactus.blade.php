<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reply to Contact Message</title>
</head>
<body style="background:#beb29f; padding:20px; ">
    <p>Hello {{ $contactMessage->fname }},</p>
    
    <p>We have received your message and would like to inform you:</p>
    
    <p>{{ $reply }}</p>
    
    <p>Thank you!</p>
</body>
</html>
