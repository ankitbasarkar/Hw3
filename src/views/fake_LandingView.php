<!DOCTYPE html>
<html>
<head>
<title>Five Thousand Characters</title>
</head>
<body>
<h1>Five Thousand Characters</h1>
<a href="writeSomething.php">Write Something!</a>
<h2>Check out what people are writing...</h2>
<form>
    <input type="text" placeholder="Phrase Filter"/>
    <select>
        <option selected="selected">All Genres</option>

        <!--        Assume getting data from the controller in a $Genres array-->
        <?php
        try
        {
            foreach($Genres as $Genre)
            {
                echo "<option>$Genre</option>";
            }
        }
        catch(Exception $e){

        }
        ?>
    </select>
    <button type="submit">Go</button>

</form>

<h3>Highest Rated</h3>
<h3>Most Viewed</h3>
<h3>Newest</h3>
</body>
</html>
