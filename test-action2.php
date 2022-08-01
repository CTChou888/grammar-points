<?php
    $grammar = $_POST["query"];
    $select_db = mysqli_connect("localhost", "root", "123456", "dangdai")
    or die("MySQL伺服器連接失敗<BR>");
    $sql_query="select ID, book as '冊數', grammar as '語法點', example as '例句'
        from dangdai4_1
        where grammar Like '%$grammar%'";
    $result = mysqli_query($select_db,$sql_query);
    echo "<p align='center'><font size='4'><b>《當代中文課程》語法點例句</p></font></b>";
    echo "<table align = 'center' border = '2'><tr align = 'center'>";
    while($meta = mysqli_fetch_field($result)){
        echo "<td> $meta->name</td>";
    }
    echo "<tr/>";
    while($row=mysqli_fetch_row($result)){
        echo "<tr>";
        for($j=0; $j<mysqli_num_fields($result); $j++){
            echo "<td>$row[$j]</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($select_db)
    ?>
    