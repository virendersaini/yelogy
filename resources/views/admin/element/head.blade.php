<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <script>
        window.app = { url : '{{ url('/')}}' }
    </script>
    <title>Just Helper</title>
    <meta name="description" content="Just Helper">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="{{ url('/public/css/all.css') }}">
    <link rel="stylesheet" href="{{ url('/public/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('/public/css/theme.css') }}">
    <link rel="stylesheet" href="{{ url('/public/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ url('/public/admin/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('/public/admin/assets/css/font-awesome.min.css') }}">
    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>   
    <style>
td.details-control {
    background: url('../../public/admin/images/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('../../public/admin/images/details_close.png') no-repeat center center;
}
</style>
</head>