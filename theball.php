<!DOCTYPE html>
<html>
<head>
    <title>Avoid the Ball</title>
    <style>
        #ball {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: red;
        }
    </style>
</head>
<body>
    <?php
    require('vendor/autoload.php');
    ?>
    <div id="ball"></div>
    <script>
        // get the ball element
        var ball = document.getElementById("ball");

        // add mousemove event listener to the document
        document.addEventListener("mousemove", function(event) {
            // get the current position of the mouse cursor
            var mouseX = event.clientX;
            var mouseY = event.clientY;

            // calculate the distance between the mouse cursor and the ball
            var ballX = ball.offsetLeft + ball.offsetWidth / 2;
            var ballY = ball.offsetTop + ball.offsetHeight / 2;
            var distance = Math.sqrt(Math.pow(mouseX - ballX, 2) + Math.pow(mouseY - ballY, 2));

            // if the distance is less than the sum of the ball radius and the mouse cursor radius,
            // move the ball away from the mouse cursor
            var ballRadius = ball.offsetWidth / 2;
            var mouseRadius = 50; // the user can never click on the ball if the mouse radius is larger than the ball radius
            if (distance < ballRadius + mouseRadius) {
                // calculate the angle between the ball and the mouse cursor
                var angle = Math.atan2(mouseY - ballY, mouseX - ballX);

                // calculate the new position of the ball
                var newX = ballX - (ballRadius + mouseRadius) * Math.cos(angle);
                var newY = ballY - (ballRadius + mouseRadius) * Math.sin(angle);

                // check if the new position of the ball is within the visible browser window
                if (newX - ballRadius >= 0 && newX + ballRadius <= window.innerWidth &&
                    newY - ballRadius >= 0 && newY + ballRadius <= window.innerHeight) {
                    // move the ball to the new position
                    ball.style.left = newX - ballRadius + "px";
                    ball.style.top = newY - ballRadius + "px";
                }
            }
        });
    </script>
</body>
</html>
