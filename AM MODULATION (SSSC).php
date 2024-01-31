<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" type="text/css" href="AM MODULATION (SSSC).css">
      <title>AM Modulation (SSSC)</title>
    </head>
    <body>
      <?php
        // Check if the user is logged in and is an instructor
        session_start();
        if (($_SESSION['userType'] != 'instructors') && (!isset($_SESSION['email']))) 
        {
          // Redirect to the home page
          header("Location: homepage.php");
          exit();
        }    
        try 
        {
          // Connect to the database
          require_once 'connection.php';  
          // Get the instructor's name and email from the database
          $email = $_SESSION['email'];
          $stmt = $conn->prepare("SELECT user_name, email FROM instructors WHERE email = :email");
          $stmt->bindParam(':email', $email);
          $stmt->execute();
          $row = $stmt->fetch();
        }
        catch (PDOException $e) 
        {
          echo "Connection failed: " . $e->getMessage();
        }
      ?>
      <div class="topnav">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <div class="dropdown">
          <button class="dropbtn" onclick="myFunction()">Experiments
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content" id="mydropdown">
            <a href="#">FM Modulation</a>
            <a href="#">AM Modulation (DSWC)</a>
            <a href="#">AM Modulation (SSSC)</a>
            <a href="#">OFDM</a>
          </div>
        </div>
        <a href="logout.php" class="logout">Logout</a>
        <p class="email"><?php echo $email; ?></p>
      </div>
      <h1>AM Modulation (SSSC)</h1>
      <h2>Objective</h2>
      <p>To observe and understand the concept of amplitude modulation using single sideband with suppressed carrier (SSSC) technique.</p>

      <h2>Introduction</h2>
      <p>Amplitude Modulation (AM) is a modulation technique where the amplitude of the carrier wave is varied according to the modulating signal. The modulating signal is usually an audio signal or a message signal which is used to modulate the carrier signal. In SSSC, the carrier wave is suppressed and only one of the sidebands is transmitted along with the modulating signal. This technique is widely used in television broadcasting and in some forms of data communication.</p>

      <h2>Apparatus</h2>
        <ul>
            <li>Audio oscillator</li>
            <li>SSSC modulator circuit</li>
            <li>RF oscillator</li>
            <li>RF amplifier</li>
            <li>LC tuned circuits</li>
            <li>Detector circuit</li>
            <li>Audio amplifier</li>
            <li>Headphones or speakers</li>
        </ul>

        <h2>Procedure</h2>
        <ol>
            <li>Connect the audio oscillator to the modulator circuit.</li>
            <li>Connect the RF oscillator to the RF amplifier.</li>
            <li>Connect the modulated signal output of the modulator circuit to the RF amplifier.</li>
            <li>Connect the modulated signal output of the modulator circuit to the RF amplifier.</li>
            <li>Connect the output of the RF amplifier to the LC tuned circuits.</li>
            <li>Connect the output of the LC tuned circuits to the detector circuit.</li>
            <li>Connect the output of the detector circuit to the audio amplifier.</li>
            <li>Connect the output of the audio amplifier to the headphones or speakers.</li>
            <li>Adjust the audio oscillator to produce a 1 kHz sine wave signal.</li>
            <li>Adjust the SSSC modulator circuit to modulate the RF carrier signal with the audio signal.</li>
            <li>Adjust the RF oscillator to produce a 1 MHz carrier signal.</li>
            <li>Adjust the LC tuned circuits to select the desired sideband and reject the other sideband and the carrier.</li>
            <li>Observe the output of the audio amplifier using the headphones or speakers.</li>
        </ol>

        <h2>Observations</h2>
        <p>When the audio oscillator is connected to the modulator circuit and the SSSC modulator circuit is adjusted to modulate the RF carrier signal with the audio signal, the output of the audio amplifier should contain only one sideband and the audio signal. The other sideband and the carrier should be suppressed. When the LC tuned circuits are adjusted properly, the desired sideband should be selected and the other sideband and the carrier should be rejected. The output of the audio amplifier should contain only the audio signal.</p>

        <h2>Conclusion</h2>
        <p>The concept of amplitude modulation using single sideband with suppressed carrier (SSSC) technique has been observed and understood. The use of SSSC technique in television broadcasting and in some forms of data communication has been explained.</p>

        <script>
            /* Dropdown menu */
            function myFunction() 
            {
                document.getElementById("mydropdown").classList.toggle("show");
            }
            window.onclick = function(event) 
            {
                if (!event.target.matches('.dropbtn')) 
                {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    for (var i = 0; i < dropdowns.length; i++) 
                    {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) 
                        {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        </script>
        <button>Perform the Experiment</button>
    </body>
</html>

