@component('mail::message')
<!DOCTYPE html>
<html>
<head>
    <title>kings</title>
</head>
<body>
        Hi <strong>{{ $name }}</strong>,
        <p>{{ $body }}</p> 
        <p>Your requisitionhas been disapproved.<p>

    <p>Thank you</p>
</body>
</html>