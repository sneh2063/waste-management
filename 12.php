<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
        <style>
        table {
            width: 80%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-top: 20px;
            margin-left: 120px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            font-weight: bold;
            color: black;
        }

        th {
            background-color: #2ecc71;
            color: #fff;
            font-weight: bolder;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        a {
            color: black;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Home</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="12.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.8.8, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-path-to-root="./" data-include-products="true" class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-header u-header" id="sec-fdd9"><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-light-1 u-text-hover-palette-2-base"  style="padding: 10px 20px;"></a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-light-1 u-text-hover-palette-2-base" href="con.html" style="padding: 10px 20px;">CONTACT</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-light-1 u-text-hover-palette-2-base" href="home.html" style="padding: 10px 20px;">LOGOUT</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" ></a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="home.html">HOME</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="home.html">LOGOUT</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-align-center u-clearfix u-image u-shading u-section-1" id="sec-fb58">
      <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-align-center u-large-text u-text u-text-variant u-text-1">
            
        <?php

          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "user_management";
          
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          
          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
          
          // Query to fetch data
          $sql = "SELECT name, type_of_waste, price, quantity, buyer_or_seller, email FROM users";
          $result = mysqli_query($conn, $sql);
          
          // Display data in a table
          echo "<table>";
          echo "<tr><th>Name</th>
          <th>Type of Waste</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Buyer/Seller</th>
          <th>Email</th></tr>";
          
          if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row["name"] . "</td>";
                  echo "<td>" . $row["type_of_waste"] . "</td>";
                  echo "<td>" . $row["price"] . " Rs/kg</td>";
                  echo "<td>" . $row["quantity"] . " Kg</td>";
                  echo "<td>" . $row["buyer_or_seller"] . "</td>";
                  echo "<td><a href='mailto:" . $row["email"] . "'>" . $row["email"] . "</a></td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='6'>0 results</td></tr>";
          }
          
          echo "</table>";
          
          mysqli_close($conn);
          ?>
        </p>
      </div>
    </section>
    
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-76f2"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-text u-text-1">waste management&nbsp;<span class="u-icon"></span>&nbsp; copywrite @2024
        </p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
    </section>
  
</body></html>