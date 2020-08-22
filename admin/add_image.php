<?php 
    //  session_start();
    //  if(!isset($_SESSION['login_user'])){
    //      echo "<script>alert('login first');
    //      window.location.href='index.php';
    //      </script>";
    //      exit(0);
    //  }
   include('connection.php');
   include('includes/header.php');
   
       $ngoid=$_POST['ngoid'];
       $titles=$_POST['title'];
       //print_r($_FILES['file']);
       $image=$_FILES['file']['name'];
      $tmpimage=$_FILES['file']['tmp_name'];
      $newimg=time().$image;
      $location='uploads/gallery/';
      echo move_uploaded_file($tmpimage,$location.$newimg);
     $query="insert into gallery(ngoid,image,titles)values('$ngoid','$newimg','$titles')";
      $result=mysqli_query($conn,$query);
      if($result){
          echo '<script>alert("Added in  gallery")
          window.location.href="manage_gallery.php";
          </script>';
      }
      else{
          echo '<script>alert("Error occured");
          window.location.href="manage_gallery.php";</script>'; 
      }
   
   ?>