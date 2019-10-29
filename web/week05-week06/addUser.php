<?php 

    $user = htmlspecialchars($_POST['uzer']);
    $pass = htmlspecialchars($_POST['pw']);
    $cpass = htmlspecialchars($_POST['cpw']);
    $email = htmlspecialchars($_POST['email']);
    $cemail = htmlspecialchars($_POST['cemail']);
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);

   
    
    if (!isset($user) || $user == "") {
        header("location: sign_up.php");
        die();
    } elseif (!isset($pass) || $pass == "" || !isset($cpass) || $cpass == "") {
        header("location: sign_up.php");
        die();
    } elseif (!isset($email) || $email == "" || !isset($cemail) || $cemail == "") {
        header("location: sign_up.php");
        die();
    } elseif (!isset($fname) || $fname == "" || !isset($lname) || $lname == "") {
        header("location: sign_up.php");
        die();
    } elseif ($pass != $cpass) {
        header("location: sign_up.php");
        die();
    }
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
   
    require_once("db_access.php");
    $db = get_db();

    
    $query = 'SELECT user_name FROM member';
    $stmt = $db -> prepare($query);
    $stmt -> execute();
    $names = $stmt -> fetchall(PDO::FETCH_ASSOC);
    
    
    foreach ($names as $name) {
        $old_name = $name['user_name'];
        if ($user === $old_name) {
            header("location: sign_up.php");
            die();
        }
    }
    
    $query = 'SELECT email FROM member';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $emails = $stmt->fetchall(PDO::FETCH_ASSOC);
    
    foreach ($emails as $mail) {
        $old_email = $mail['email'];
        if ($email === $old_email) {
            header("Location: sign_up.php");
            die();
        }
    }
    $query = 'INSERT INTO member (user_name, password, email, first_name, Last_name) VALUES (:user, :pass, :email, :fname, :lname)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':pass', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindValue(':lname', $lname, PDO::PARAM_STR); 
    $result = $stmt->execute();
  
    flush();
    header("Location:login.php");
    die();
    
    ?>