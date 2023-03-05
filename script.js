import fs from 'fs';
function playGame(){
    const directory = fs.script('files');
    let file
    while ((file = directory.readSync()) !== null){
        console.log(file.name)
    }
    directory.closeSync();
}