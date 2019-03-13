$("#docs").on('submit', function(e){
e.preventDefault();
$.ajax({
type: 'POST',
url: 'upload.php',
data: new FormData(this),
contentType: false,
cache: false,
processData:false,
beforeSend: function(){
$('.submitBtn').attr("disabled","disabled");
$('#docs').css("opacity",".5");
},
success: function(msg){
$('.statusMsg').html('');
if(msg == 'ok'){
$('#docs')[0].reset();
$('.statusMsg').html('<span style="font-size:18px;color:#34A853">Documents uploaded successfully.</span>');
}else{
$('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
}
$('#docs').css("opacity","");
$(".submitBtn").removeAttr("disabled");
}
});
});