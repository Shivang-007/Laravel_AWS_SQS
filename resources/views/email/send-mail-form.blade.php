<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" />
    <title>Send Email</title>
</head>
<body>
    <form action="{{ route('send.email') }}" method="POST">
        @if(session('success'))
            <div>{{ session('success') }}</div>
        @endif
        @csrf
        <div>
            <label for="email">Recipient Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        
        <div>
            <label for="content">Email Content:</label>
            <textarea name="content" id="content" rows="4" required></textarea>
        </div>
        
        <button type="submit">Send Email</button>
    </form>
</body>
</html>
