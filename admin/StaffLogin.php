<html>
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
        <form id='login' action='StaffLogin_php.php' method='post' accept-charset='UTF-8'>
            <div class="container">
                <label for="Email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="Email" required>

                <label for="Password"><b>Password</b></label>
                <input type="Password" placeholder="Enter Password" name="Password" required>

                <button type="submit">Login</button>
                </label>
            </div>
        </form>

    </body>
</html>