<html>
    <head>
        <title>Widget Corp</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>

    <body>
        <header>
            <h1>Widget Corp Admin</h1>
        </header>
        <nav>
        </nav>
        <main>
            <h2>1. Setup connection and database</h2><br/>
            <form action="setup.php" method="post">
                <label>Server name :</label><input type="text" name="server_name" value="" /><br/>
                <label>Username :</label><input type="text" name="db_username" value="" /><br/>
                <label>Password :</label><input type="password" name="db_password" value="" /><br/>
                <label>Database name :</label><input type="text" name="db_name" value="widget_corp" readonly="true" /><br/>
                <label>Table 1 :</label><input type="text" name="tb_1" value="subjects" readonly="true" /><br/>
                <label>Table 2 :</label><input type="text" name="tb_2" value="pages" readonly="true" /><br/>
                <label>Table 3 :</label><input type="text" name="tb_3" value="admins" readonly="true" /><br/><br/>
                <h2>2. Create an admin</h2><br/>
                <label>Username :</label><input type="text" name="username" value="" /><br/>
                <label>Password :</label><input type="password" name="password" value="" /><br/><br/>
                <input type="submit" name="submit" value="Setup" /><br/><br/>
                <span><?php if(isset($_GET["message"]))
                                echo $_GET["message"];?></span>
            </form>
            <br/>
        </main>
    </body>
</html>