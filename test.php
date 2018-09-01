<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<img id="Imgs" name="slide" src="https://www.technotification.com/wp-content/uploads/2016/07/Why-is-Java-the-best-programming-Language.png" width="150px"/>
</body>
</html>

<script type="text/javascript">
var Images=['https://upload.wikimedia.org/wikipedia/en/thumb/3/30/Java_programming_language_logo.svg/1200px-Java_programming_language_logo.svg.png','https://pbs.twimg.com/profile_images/426420605945004032/K85ZWV2F_400x400.png'];
//Step counter
var step=1;
function gallery(){
//change image
document.getElementById('Imgs').src=Images[step];
//Or you can use - document.images.slide.src=Images[step];
// is step more than the image array?
if(step<Images.length-1){
// No - add 1 for next image.
step++;
}else{
// Yes - Start from the first image
	step=0;
}
}
//When the ready, set interval.
window.onload=setInterval(gallery, 2500);

</script>