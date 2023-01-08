<html>
<head>
    <title>Ajax Example</title>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>

    <script>
        function getMessage() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/getmsg',
                {{--data:'_token = <?php echo csrf_token() ?>',--}}
                success:function(data) {
                    $("#msg").html(data.msg);
                }
            });
        }
    </script>
</head>

<body>
<form action="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id = 'msg'>This message will be replaced using Ajax.
        Click the button to replace the message.</div>
    <button type="button" onclick="getMessage()">Replace Message</button>
</form>

</body>

</html>
