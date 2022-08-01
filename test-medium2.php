<?php
    $grammar = $_POST["grammar"];
    $select_db = mysqli_connect("localhost", "root", "123456", "dangdai")
    or die("MySQL伺服器連接失敗<BR>");   
    $sql_query="select grammar 
    from dangdai4_1
    where grammar Like '%$grammar%'
    group by grammar";
    $result = mysqli_query($select_db,$sql_query);
    echo "<p align='center'><font size='4'><b>《當代中文課程》語法點例句</p></font></b>";
    ?>
    <form method="post" action="test-action2.php">
        <?php
            echo "<p align='center'> 選擇語法點：</p>";
            echo "<p align='center'><select name='query'></p>";    
            while($row=mysqli_fetch_row($result)) {
                    echo "<option value='$row[0]'> $row[1]$row[0]</option><BR>";
                    }
        echo "</select>";
        echo "<BR><BR>";  
    mysqli_close($select_db)
    ?>
        </select>
        <BR>
<!--<input type="hidden" name="query" value="$value">-->
<input type="submit" value="送出">
</form>
</body>
</html>
    