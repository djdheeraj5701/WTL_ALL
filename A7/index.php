<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Info - PHP</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <style>
            table{
                width: 100%;
            }
            th,td{
                width: 20%;
                text-align: left;
                border: 0.5px solid black;
                border-style: ridge;
            }
            th{
                border: 2px solid black;
            }
        </style>
        <div style="text-align: center;">
            <h1><b>Student Info</b></h1>
            <h3>Focus on your studies !!!!</h3>
        </div>
        <div style="width: 100%; display: inline-flex;flex-direction: row; padding-top: 50px; font-size: 18px;">
            <div style="width: 40%; padding-left: 15%;">
                <form action="students.php" method="post">
                    <label for="stud_id">Roll No:</label><br>
                    <input required type="text" id="stud_id" name="stud_id"><br><br>
                    <label for="stud_name">Name:</label><br>
                    <input required type="text" id="stud_name" name="stud_name"><br><br>
                    <div style="display: inline-flex;flex-direction: row;">
                        <label for="stud_class">Class:</label><br>
                        <select style="height: 20px; margin-left: 5px; width: 40px;" required id="stud_class" name="stud_class">
                            <option value='FE'>FE</option>
                            <option value='SE'>SE</option>
                            <option value='TE'>TE</option>
                            <option value='BE'>BE</option>
                        </select>
                        <div style="padding-left: 50px;"></div>
                        <label for="stud_div">Divison:</label><br>
                        <select style="height: 20px; margin-left: 5px; width: 40px;" required id="stud_div" name="stud_div">
                           
                            <?php
	                        for($i=1;$i<13;$i++){
	                        	echo "<option value='$i'>$i</option>";
	                        }
	                        ?>

                        </select>
                    </div><br><br>
                    <label for="stud_city">City:</label><br>
                    <input required type="text" id="stud_city" name="stud_city"><br><br>
                    <button name="edit" value="edit" type="submit" style='background-color:transparent; border: none;'>
	                    <i class='fa fa-edit' style='font-size:32px;'></i>
	                </button>
                </form>
            </div>
            <div style="width: 60%;">
                <table>
                    <tr>
                        <th>Roll (ID)</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Div</th>
                        <th>City</th>
                        <th></th>
                    </tr>
                    <?php
                    require_once "config.php";
                    $q="SELECT * FROM students_info";
                    $res=$pdo->query($q);
                    while($row=$res->fetch()){
                        echo 
                        "<tr>".
                            "<td>".$row['stud_id']."</td>".
                            "<td>".$row['stud_name']."</td>".
                            "<td>".$row['stud_class']."</td>".
                            "<td>".$row['stud_div']."</td>".
                            "<td>".$row['stud_city']."</td>".
                            "<td>".
                                "<form action='students.php' method='post'>".
                                "<button type='submit' name='delete' value=".$row['stud_id']." style='background-color: transparent; border: none;'>".
                                    "<i class='fa fa-trash' style='font-size:26px; color:crimson;'></i>".
                                "</button>".
                                "</form>".
                            "</td>".
                        "</tr>";
                    }	
                    unset($res);
                    unset($pdo);
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>