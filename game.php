<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <title>Current round</title>
</head>
<body>
    <h1 id="title2">Game is ongoing</h1>
    <div>
    <?php
    function generateQuestion(){
        $songs = array();
        $songNames = array();
        $files = glob('songs/*.{mp3}', GLOB_BRACE);
        foreach($files as $file){
            $songs[] = $file;
            $songNames[] = trim(str_replace('songs/','',$file));
            echo $file." | ".trim(str_replace('songs/','',$file))."<br>";
        }
        $song = $songs[rand(0,count($songs)-1)];
        $theSongName = trim(str_replace('songs/','',$song)); $theSongName = trim(str_replace('.mp3','',$song));
        echo("
        <audio controls autoplay>
        <source src='$song' type='audio/mp3'>
        </audio><br>");
        ?>
        <?php
        $array = array();
        $one = "<button id='win' type='button' onclick='win()' style='background-color:lightgreen;'>".trim(str_replace('.mp3','',trim(str_replace('songs/','',$song))))."</button>";
        array_push($array, $one);
        array_splice($songNames,array_search(trim(str_replace('songs/','',$song)),$songNames), array_search(trim(str_replace('songs/','',$song)),$songNames));
        shuffle($songNames);
        for($n = 0; $n < 3; $n++){
            array_push($array, "<button type='button' onclick='lose()'>".trim(str_replace('.mp3','',$songNames[$n])))."</button>";
        }
        shuffle($array);
        return $array;
    }
    function printQuestions(){
        foreach(generateQuestion() as $element){
            echo($element);
        }
    }
    printQuestions();
    ?>
    </div>
</body>
</html>