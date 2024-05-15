<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
    <div id="mm">
        <h1>Welcome!</h1>
        <p>Please press click on the button below to show the data.</p>
    </div>
    <div id="data" style="display: none;">
        <?php
        $connect=mysqli_connect('db','php_docker','password','php_docker');
        $table_name = 'student';
        $query = "SELECT * FROM $table_name";
        $response=mysqli_query($connect,$query);

        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>ID</th><th>Age</th><th>CGPA</th></tr>";

        while($i = mysqli_fetch_assoc($response)){
            echo "<tr>";
            echo "<td>". $i['Name']."</td>";
            echo "<td>". $i['id']."</td>";
            echo "<td>". $i['age']."</td>";
            echo "<td>". $i['cgpa']."</td>";
            echo "</tr>";
        }

        echo "</table>";

        mysqli_close($connect);
        ?>
    </div>
    <script>
        function showData() {
            var mmDiv = document.getElementById('mm');
            var dataDiv = document.getElementById('data');
            mmDiv.style.display = 'none';
            dataDiv.style.display = 'block';
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                showData();
            }
        });

        function showDataOnClick() {
            showData();
            var showDataButton = document.getElementById('showDataButton');
            showDataButton.style.display = 'none';
        }

        function showWelcome() {
            var mmDiv = document.getElementById('mm');
            var dataDiv = document.getElementById('data');
            mmDiv.style.display = 'block';
            dataDiv.style.display = 'none';
            var showDataButton = document.getElementById('showDataButton');
            showDataButton.style.display = 'block';
        }
    </script>
    <button id="showDataButton" onclick="showDataOnClick()">Show Data</button>
    <button style="display: none;" onclick="showWelcome()">Show Data Again</button>
</body>
</html>
