<html>
    <head>
        <title>Edu Planner</title>

        <!-- Links the CSS file to the PHP file -->
        <?php echo '<link rel="stylesheet" type="text/css" href="style.css"></head>'; ?>
    </head>

    <body>
        <div class="login-box">
            <h2>Login</h2>
            <form method="post" action="">
              <div class="user-box">
                <input type="text" name="email">
                <label>Username</label>
              </div>
              <div class="user-box">
                <input type="password" name="password">
                <label>Password</label>
              </div>
              <input type="submit" name="submit">
            
            </form>
            <div class = "echo-statement">
            <?php include("loginArithmetic.php"); ?>
            </div>
          </div>
    </body>
    </style>

</html>