<html>

<body>

    <pre>
</pre>
    <?php
    $user = "bhavana";
    $pass = "@Root1234";
    $i=$_POST['i'];
$p=$_POST['p'];
    

    if ($user == $i && $pass == $p)
        //if($i=='bhavana' && $p=='@Root1234')
        header("Location: http://localhost/aditya project/admin.html");
    else
        echo "Please Enter Correct User id or Password";
    ?>
    <br>
    <a href="adminportal.html">go back</a>

</body>

</html>