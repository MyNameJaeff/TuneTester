numberOfCorrect = 0;
numberOfLosses = 0;
function win(){
    numberOfCorrect++;
    document.getElementById("title2").innerHTML = "You WIN: Total of " + numberOfCorrect + " times";
}
document.getElementById("lose").addEventListener("click", function lose(){
    numberOfLosses++;
    document.getElementById("title2").innerHTML = "You LOST: Total of " + numberOfLosses + " times";
});