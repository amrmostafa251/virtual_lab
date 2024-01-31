<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" type="text/css" href="AM MODULATION (DSWC).css">
      <title>AM Modulation (DSWC)</title>
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
            <a href="#">AM Modulation</a>
            <a href="#">OFDM</a>
          </div>
        </div>
        <a href="logout.php" class="logout">Logout</a>
        <p class="email"><?php echo $email; ?></p>
      </div>
      <h1>AM Modulation (DSWC)</h1>
      <h2>Objective</h2>
      <p>To observe and understand the concept of amplitude modulation using double sideband with carrier (DSWC) technique.</p>

      <h2>Introduction</h2>
      <p>Amplitude Modulation (AM) is a modulation technique where the amplitude of the carrier wave is varied according to the modulating signal. The modulating signal is usually an audio signal or a message signal which is used to modulate the carrier signal. In DSWC, both the upper and lower sidebands are transmitted along with the carrier wave. This technique is widely used in AM radio broadcasting.</p>

      <h2>Apparatus</h2>
    <ul>
      <li>Audio oscillator</li>
      <li>DSWC modulator circuit</li>
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
      <li>Connect the output of the RF amplifier to the tuned circuit.</li>
      <li>Connect the output of the tuned circuit to the detector circuit.</li>
      <li>Connect the output of the detector circuit to the audio amplifier.</li>
      <li>Connect the output of the audio amplifier to the headphones or speakers.</li>
      <li>Turn on the audio oscillator and adjust the frequency and amplitude of the modulating signal.</li>
      <li>Turn on the RF oscillator and adjust the frequency and amplitude of the carrier signal.</li>
      <li>Adjust the LC tuned circuits to select the desired carrier frequency and bandwidth.</li>
      <li>Listen to the output on the headphones or speakers and observe the modulation envelope.</li>
    </ol>

    <h2>Precautions</h2>
    <ul>
      <li>Be careful not to overload the input of the modulator circuit with too high of an audio signal level.</li>
      <li>Ensure that the modulator circuit is properly tuned and calibrated before beginning the experiment.</li>
      <li>Take appropriate safety precautions when working with electrical circuits, including:
      <ul>
        <li>Wearing safety goggles and appropriate clothing.</li>
        <li>Keeping loose hair and clothing away from the equipment.</li>
        <li>Using insulated tools.</li>          <li>Working with dry hands in a dry environment.</li>
        </ul>
      </li>
    </ul>

    <button>Perform the Experiment</button>
  </body>

</html>
