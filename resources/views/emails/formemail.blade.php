<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta
        name = "viewport"
        content ="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
        >
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
        >
    <title>New Email from Website</title>
</head>
    <body>
        <div class="email-message">
            <h1>From: {{$name}}</h1>
            <h3>email: {{$email}}</h3>
            <hr>
            <p>Message: {{$body}}</p>
        </div>

    </body>
</html>
