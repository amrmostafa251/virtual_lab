<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="fm modulation.css">
        <title>FM MODUALATION </title>
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
        <h1>FM Modulation Experiment</h1>
        <h2>Definitions</h2>
        <p><strong>Frequency Modulation (FM):</strong> A method of encoding information on a carrier wave by varying the frequency of the wave in proportion to the amplitude of the modulating signal.</p>
        <p><strong>Modulating signal:</strong> The signal that contains the information to be transmitted.</p>
        <p><strong>Carrier signal:</strong> The high-frequency wave that carries the modulating signal.</p>
        
        <h2>Objective</h2>
        <p>The objective of this experiment is to demonstrate the process of FM modulation and to observe the effects of changing the modulation index on the modulated waveform.</p>
        
        <h2>Procedure</h2>
        <ol>
            <li>Connect the audio source to the input of the FM modulator circuit.</li>
            <li>Connect the output of the FM modulator circuit to an oscilloscope or spectrum analyzer.</li>
            <li>Adjust the modulation index of the modulator circuit to produce the desired level of frequency deviation.</li>
            <li>Observe and record the modulated waveform on the oscilloscope or spectrum analyzer.</li>
            <li>Repeat steps 3 and 4 for different modulation index values.</li>
        </ol>
        
        <h2>Expected Output</h2>
        <p>When an audio signal is applied as the modulating signal, the modulated waveform should show a sinusoidal wave whose frequency varies according to the amplitude of the modulating signal. As the modulation index is increased, the amplitude of the modulated waveform should increase, and the frequency deviation should become more pronounced.</p>
        
        <h2>Precautions</h2>
        <ul>
            <li>Be careful not to overload the input of the modulator circuit with too high of an audio signal level.</li>
            <li>Ensure that the modulator circuit is properly tuned and calibrated before beginning the experiment.</li>
            <li>Take appropriate safety precautions when working with electrical circuits.</li>
        </ul>
    </body>
</html>