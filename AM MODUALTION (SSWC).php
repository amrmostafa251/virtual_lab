<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="AM MODUALTION (SSWC).css">
    <title>AM Modulation (SSWC) Experiment</title>
  </head>
  <body>
    <div class="topnav">
      <a href="#home">Home</a>
      <a href="#about">About</a>
      <div class="dropdown">
        <button class="dropbtn" onclick="myFunction()">Experiments
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" id="mydropdown">
          <a href="#">FM Modulation</a>
          <a href="#">AM Modulation (DSB-SC)</a>
          <a href="#">AM Modulation (SSB)</a>
        </div>
      </div>
      <a href="logout.php" class="logout">Logout</a>
      <p class="email"><?php echo $email; ?></p>
    </div>
    <h1>AM Modulation (SSWC) Experiment</h1>
    <p>Welcome to the AM Modulation (SSWC) Experiment page!</p>
    <p>Here, you will learn how to perform amplitude modulation using a single-sideband with -carrier (SSWC) method.</p>
    <h2>Instructions</h2>
    <ol>
      <li>Connect the audio signal source to the modulator circuit.</li>
      <li>Connect the modulator circuit output to the SSWC circuit input.</li>
      <li>Connect the SSWC circuit output to the antenna or an oscilloscope.</li>
      <li>Adjust the modulator and SSWC circuits as needed to achieve the desired modulation level and frequency.</li>
      <li>Observe the resulting AM modulated signal on the oscilloscope or other output device.</li>
    </ol>
    <h2>Precautions</h2>
    <ul>
      <li>Be careful not to overload the input of the modulator circuit with too high of an audio signal level.</li>
      <li>Ensure that the modulator circuit is properly tuned and calibrated before beginning the experiment.</li>
      <li>Take appropriate safety precautions when working with electrical circuits, including:
        <ul>
          <li>Wearing safety goggles and appropriate clothing.</li>
          <li>Keeping loose hair and clothing away from the equipment.</li>
          <li>Using insulated tools.</li>
          <li>Working with dry hands in a dry environment.</li>
        </ul>
      </li>
    </ul>
    <button onclick="performExperiment()">Perform the Experiment</button>
    <!-- Add any necessary JavaScript functions here -->
  </body>
</html>
