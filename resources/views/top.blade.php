<html>
    <head>
        <title>Nojika with PHP</title>
        <script
                src="https://code.jquery.com/jquery-3.3.1.js"
                integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="/nojika/css/nojika.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="top_square">
            <img src="/nojika/svg/top/deer.svg" width="250" height="400" style="float: left; margin-top: 35px; margin-right: 35px;"/>
            <p class="top_title">Nojika with PHP</p>
            <form method="post" action="">
                <br>
                <label class="top_label"><b>ID:</b></label><input type="text" name="user_id">
                <br>
                <br>
                <label class="top_label"><b>PW:</b></label><input type="password" name="user_pw">
                <br>
                <br>
                <br>
                <br>
                　　　　　<button type="submit" class="btn btn-primary">login</button>

                {{ csrf_field() }}
            </form>
        </div>
    </body>
</html>