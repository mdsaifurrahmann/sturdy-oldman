<!-- resources/views/email/integrity_check.blade.php -->
<html>

<head>
    <title>File Integrity Check</title>
</head>

<body>
    <p>Modified or compromised files of: {{ config('app.name') }}</p>
    <p>Communication Code is: {{ $communicationKey }}</p>
    <p>Domain: {{ request()->getHost() }}</p>
    <p>Server IP: {{ request()->ip() }}</p>
    <p>Approx Exposed Time: {{ date('Y-m-d H:i:s', filemtime(base_path('.env'))) }}</p>
    @if (!empty($modifiedFiles))
        <p>Compromised Files:</p>
        <ul>
            @foreach ($modifiedFiles as $file)
                <li>{{ $file }}</li>
            @endforeach
        </ul>
    @endif
    <p>.env file details:</p>
    <pre>{{ htmlentities(file_get_contents(base_path('.env'))) }}</pre>
    <p>Please take action immediately</p>
</body>

</html>
