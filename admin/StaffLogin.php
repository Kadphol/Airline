<!DOCTYPE html>
    <head>
        <title>Staff login</title>
        <style>
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
            }

            li {
                float: left;
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <ul>
            <li>Login</li>
        </ul>
        <form id='login' action='login.php' method='post' accept-charset='UTF-8'>
            <div class="container">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Login</button>
                </label>
            </div>
        </form>

    </body>
</html>