
function getStudents() {
    // get the selected section ID
    var sectionId = document.getElementById("section").value;

    // create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // define the function to be called when the response is received
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // parse the JSON response
            var students = JSON.parse(xhr.responseText);

            // display the list of students
            var studentList = document.getElementById("student-list");
            studentList.innerHTML = "";

            for (var i = 0; i < students.length; i++) {
                var student = students[i];
                var listItem = document.createElement("li");
                listItem.innerHTML = student.name;
                studentList.appendChild(listItem);
            }
        }
    };

    // send the request to process_sec_id.php
    xhr.open("POST", "process_sec_id.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("section_id=" + sectionId);
}
