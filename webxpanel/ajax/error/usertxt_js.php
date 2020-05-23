<?php  if($error == true)
      {
        echo "<script type='text/javascript'>";
        echo "Swal.fire({
                  icon: 'error',
                  title: ";
                  echo "'$errormessage',";
                  echo "

                }

              )";
    echo "</script>";
    //  echo "<div class='alert alert-danger' role='alert'>";
    //  echo $errormessage;
    //  echo "</div>";
      }
  ?>
  <?php  if($succes == true)

          {
            echo "<script type='text/javascript'>";
            echo "Swal.fire({
                      icon: 'success',
                      title: ";
                      echo "'Basariyla Kaydedilmistir.',";
                      echo "

                    }

                  )";
        echo "</script>";


      //  echo "<div class='alert alert-success' role='alert'>Basarıyla Kaydedilmiştir.</div>";
        }
    ?>
    <?php  if($succes2 == true)

            {
              echo "<script type='text/javascript'>";

              echo "Swal.fire({
                        icon: 'success',
                        title: 'Basari', ";

                        echo "html: 'Erişim Kodunuz : <strong>$urlver</strong>  <br> Paylaşım linkini url sorgulamadan öğrenebilirsiniz.',";

                        echo "

                      }

                    )";
          echo "</script>";


        //  echo "<div class='alert alert-success' role='alert'>Basarıyla Kaydedilmiştir.</div>";
          }
      ?>
    <?php  if($loginsuc == true)

            {
              echo "<script type='text/javascript'>";
              echo "Swal.fire({
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500,
                        title: ";
                        echo "'Başarıyla Giriş Yapıldı.',";
                        echo "

                      }

                    )";
          echo "</script>";


        //  echo "<div class='alert alert-success' role='alert'>Basarıyla Kaydedilmiştir.</div>";
          }
      ?>
      <?php  if($register == true)

              {
                echo "<script type='text/javascript'>";
                echo "Swal.fire({
                          icon: 'success',
                          showConfirmButton: false,
                          timer: 1500,
                          title: ";
                          echo "'Başarıyla Kayit İşleminiz Yapılmıştır.',";
                          echo "

                        }

                      )";
            echo "</script>";


          //  echo "<div class='alert alert-success' role='alert'>Basarıyla Kaydedilmiştir.</div>";
            }
        ?>
        <?php  if($send_contact == true)

                {
                  echo "<script type='text/javascript'>";
                  echo "Swal.fire({
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500,
                            title: ";
                            echo "'Basariyla Gönderildi.',";
                            echo "

                          }

                        )";
              echo "</script>";


            //  echo "<div class='alert alert-success' role='alert'>Basarıyla Kaydedilmiştir.</div>";
              }
          ?>
