<!-- Some design copied from https://www.sitepoint.com/users-php-sessions-mysql -->

<!DOCTYPE html>
<html>
<head>
    <title>New User Registration Form</title>
    <style>
        body {
            max-width:400px;
            margin: 0 auto;
            text-align: center;
            padding: 70px 0;
        }
    </style>    
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>

</head>

<body>
    <h3>New User Registration Form </h3>
    <p><font color="orangered" size="+1"<tt><b>*</b></tt></font> indicates a requires field</p>

        <form method="post" action="signup.php">

        <table border="0" cellpadding="0" cellspacing="5">
        <tr>    
            <td align="right">
                <p>Username</p>
            </td>


            <td>
                <input name="newname" type="text" maxlength="100" size="25"/>
                <font color="orangered" size="+1"><tt><b>*</b></tt></font>
            </td>   


        </tr>



        <tr>    
            <td align="right">
                <p>Password</p>
            </td>


            <td>
                <input name="newpassword" type="password" maxlength="100" size="25"/>
                <font color="orangered" size="+1"><tt><b>*</b></tt></font>
            </td>   


        </tr>

        <tr>    
            <td align="right">
                <p>Email</p>
            </td>


            <td>
                <input name="newemail" type="text" maxlength="100" size="25"/>
                <font color="orangered" size="+1"><tt><b>*</b></tt></font>
            </td>   


        </tr>

        <tr valign = "top">
            <td align="right">
                <p>Other Notes</p>
            </td>
            <td>
                <textarea wrap="soft" name="newnotes" rows="5" cols="30"></textarea>
            </td>
        </tr>   


        <tr>
            <td align="right" colspan="2">
                <hr noshade="noshade" />
                <input type="reset" value="Reset Form" />
                <input type="submit" name="submitok" value="   OK    "/>
            </td>   
        </tr>
        </table>

</html>
