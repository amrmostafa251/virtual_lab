<!DOCTYPE html>
<html>
    <head>
    <title>assign Task for Student</title>
    </head>
    <body>
        <!-- First list to select a value -->
        <label for="selected_value">Select a value:</label>
        <select id="selected_value" name="selected_value">
        <option value="value1">Value 1</option>
        <option value="value2">Value 2</option>
        <option value="value3">Value 3</option>
        </select>
            <!-- Second list to display related data based on selected value -->
            <label for="related_data">Related data:</label>
            <select id="related_data" name="related_data">
            <?php
            try{
                require_once 'connection.php';
                // Connect to database and retrieve related data based on selected value
                $selected_value = $_POST['selected_value'];
                //$pdo = new PDO("mysql:host=localhost;dbname=mydatabase", "username", "password");
                $stmt = $conn->prepare("SELECT second_value FROM mytable WHERE myvalue = :selected_value");
                $stmt->bindParam(':selected_value', $selected_value);
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
                // Populate the second list with retrieved data
                foreach ($data as $row) 
                {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }}
                catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
            ?>
        </select>
    </body>
</html>
