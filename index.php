<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Cars Website</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <div class="navbar">   
        <nav>
          <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#">OUR CARS</a></li>
            <li><a href="#">ABOUT</a></li>
            <li><a href="#">CONTACT</a></li>
            <li>
              <a href="#">
                <i class="fa-solid fa-bars"></i>
              </a>
            </li>
          </ul>
        </nav>
      </div>

      <div class="row">
        <div class="col">
          <h1>Araba Websitesi</h1>
          <button class="btn">ALL CARS</button>
        </div>
        <div class="col">
          <div class="cards">
            <?php
            // Veritabanına bağlanma
            $servername = "localhost";
            $username = "username";
            $password = "password";
            $dbname = "cars_database";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Bağlantıyı kontrol etme
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Araba bilgilerini veritabanından alıp gösterme
            $sql = "SELECT * FROM cars";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Veritabanından her bir satır için
                while($row = $result->fetch_assoc()) {
                    echo '<div class="card">';
                    echo '<div class="card-head">';
                    echo '<h5>' . $row["brand"] . '</h5>';
                    echo '<p>' . $row["description"] . '</p>';
                    echo '</div>';
                    echo '<a href="#" class="btn">Details</a>';
                    echo '<div class="card-bottom">';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>


