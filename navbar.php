<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SUNY New Paltz</title>
    <link rel="stylesheet" href="css/navbar.css">
</head>

<body>
    <nav id="topnav">
        <div class="wrap-nav">
            <div class="image-container">
                <a id="home" class="nav-img" href="./index.php"><img class="nav-img" src="./img/newpaltzlogo.jpg"
                alt="Home"></a>
            </div>
            <a id="majors" class="nav-link" href="./majors.php">Majors</a>
            <a id="one" class="nav-link one-big" href="./apply.php">Apply</a>
            <a id="two" class="nav-link two-big" href="./login.php">Login</a>
            <a id="three" class="nav-link three-big" href="./staff.php">Staff</a>
            <div class="dropdown">
                <button class="dropbtn" onclick="showDropDown()">Dropdown
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content" onclick="hideDropDown()" id="myDropdown">
                    <div class="one-small">
                        <a id="one-small-a" class="nav-link" href="./apply.php">Apply</a>
                    </div>
                    <div class="two-small">
                        <a id="two-small-a" class="nav-link" href="./login.php">Login</a>
                    </div>
                    <div class="three-small">
                        <a id="three-small-a" class="nav-link" href="./staff.php">Staff</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>