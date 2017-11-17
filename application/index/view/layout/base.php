<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <link rel="stylesheet" href="__PUBLIC__home/css/reset.css">
    <link rel="stylesheet" href="__PUBLIC__home/css/main.css">
    <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
    <title>预约订餐</title>
</head>
<body onunload="js_delSession()">

{__CONTENT__}

</body>
<script>
    function  js_delSession() {
        $.ajax({

                url:"{:url('index/delSession')}"
            }

        )
    }
</script>
</html>