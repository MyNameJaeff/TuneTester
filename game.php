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
    <?php
    $songs = array();
    $songNames = array();
    $files = glob('songs/*.{mp3}', GLOB_BRACE);
    foreach($files as $file){
        $songs[] = $file;
        $songNames[] = trim(str_replace('songs/','',$file));
        //echo $file." | ".trim(str_replace('songs/','',$file))."<br>";
    }
    $song = $songs[rand(0,count($songs)-1)];
    $theSongName = trim(str_replace('songs/','',$song)); $theSongName = trim(str_replace('.mp3','',$song));
    echo("
    <audio controls autoplay>
    <source src='$song' type='audio/mp3'>
    </audio><br>");
    for($n = 0; $n < 4; $n++){
        if($songNames[$n] == trim(str_replace('songs/','',$song))){
            echo("<button id='win' type='button' onclick='win()'>".trim(str_replace('.mp3','',$songNames[$n]))."</button>");
        }else{
            echo("<button>".trim(str_replace('.mp3','',$songNames[$n]))."</button>");
        }
    }
    ?>
    <script>
        function win(){
            document.getElementById("title2").innerHTML = "You WIN";
        }
    </script>
</body>
</html>