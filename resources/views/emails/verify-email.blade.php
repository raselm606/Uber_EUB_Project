<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email Address</title>
</head>
<body>
<p>Hello {{ $user->name }},</p>
<p>Please click the following link to verify your email address:</p>
<p><a href="{{ route('verify', ['code' => $user->verification_code]) }}">Verify Email Address</a></p>
<p>If you did not create an account, no further action is required.</p>
<p>Thank you!</p>
</body>
</html>
