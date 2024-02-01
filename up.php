    <?php
        session_start();
        include('dbConnect.php');

        // echo "Filename: " . $_FILES['file']['name']."<br>";
        // echo $_FILES['file']['name'];

      if(isset($_FILES["file"]["name"])){
        $email = $_POST["email"];
        // echo $email;

        // echo $_FILES["file"]["name"];

        $imageName = $_FILES["file"]["name"];
        $imageSize = $_FILES["file"]["size"];
        $tmpName = $_FILES["file"]["tmp_name"];

        // Image validation
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)){
          echo
          "
          <script>
            alert('Invalid Image Extension');
            document.location.href = './profile.php';
          </script>
          ";
        }elseif ($imageSize > 1200000){
          echo
          "
          <script>
            document. location.href = './profile.php';
            alert('Image Size Is Too Large');
          </script>
          "
          ;
        }else{
          $newImageName = $email . "_" . date("Y.m.d") . "_" . date("h.i.sa");
          $newImageName .= "." . $imageExtension;
          $url = "img/".$newImageName ;

          $query = "UPDATE `pro_img` SET `url`='$url' WHERE `email`='$email';";
          mysqli_query($conn, $query);

          move_uploaded_file($tmpName, 'img/' . $newImageName);
          // echo "done";
          echo
          "
          <script>
            document. location.href = './profile.php';
          </script>
          "
          ;
        }
      }
    ?>