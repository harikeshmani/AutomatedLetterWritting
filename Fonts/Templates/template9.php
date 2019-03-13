<?php
include 'getdata.php';
?>
<!DOCTYPE html>
<html class="boxed">
	<head>
		<?php include '../header.php'; ?>
	</head>
	<body>
		<!----modal---->
		<!----modal for uploading documents--->
		<div class="modal" id="noAnimModal" tabindex="-1" role="dialog" aria-labelledby="" style="display: none;" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="noAnimModalLabel">upload your documents</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="file" name="documents" placeholder="upload your documents">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light" >Upload</button>
					</div>
				</div>
			</div>
		</div>
		<!---->
		<!--modal for sending email-->
		<!---->
		<!---modal ----->
		<div class="body">
			<div role="main" class="main">
				<!--all page code goes here-->
				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<h1>पूरा पत्र</h1>
							</div>
						</div>
					</div>
				</section>
				
				<div class="container" id="divToPrint">
					<div class="row">
						<div class="col">
							<h4 class="text-right">
							दिनांक:<?php echo $letter_data['added_on']; ?></h4>
							<h4>सेवा मे,</br>
							माननीय प्रधान मंत्री जी</h4>
							<p><h3>विषय: <?php echo $template_name['name']; ?></h3></p>
							<p><h4>श्रीमान,</h4></p>
							<p><h4>बहुत दुःख के साथ मुझे ये कहना पर रहा है की किसानो के उज्जवल भविस्य के लिए उठाये गए उत्तर प्रदेश
								सरकार की इस <?php echo $letter_data['answer1']; ?> दुकान की योजना पर रिश्वत की हल चल रही है
								
							</h4></p>
							<p><h4> यह हल किसानो के खेतो में नहीं बल्कि उनके घरो में चलाई जा रही है कहने का अर्थ है <?php echo $letter_data['answer1']; ?> दुकान खोलने के लिए लोगो से <?php echo $letter_data['answer4']; ?>  का fixed deposit माँगा जा रहा है जबकि ऐसा government के scheme में नहीं है
							</h4></p>
							<p><h4> आप तो सब जानते हैं क्योंकि नाम हे है जनता पार्टी, यानि जो सबकुछ जनता हो आप हम किसानो को जानते हैं आपने मुफ्त में दुकान खोलने का वायदा किया है मुझे पक्का उम्मीद है की आप अपना वायदा जरूर पूरा करेंगे और इन बैंक वालो की मनमानी पर उनको सबक सिखाएंगे , जिससे देश में रिश्वतखोरी ख़त्म होने के साथ साथ उज्जवल भविस्य भी मिल सके.
							</h4></p>
							<p> <h4>रिश्वत मांगने वाले बैंक का नाम  :- <?php echo $letter_data['answer2']; ?> </h4></p>
							<p> <h4>रिश्वत मांगने वाले बैंक का पता :- <?php echo $letter_data['answer3']; ?> </h4></p>
							<p><h4>	आपका विश्वासी </h4></p>
							<p><h4>नाम :- <?php echo $user_id_data['username']; ?> </h4></p>
							
							<!-- <p><h4><?php/* echo $letter_data['answer6'] */?></br> -->
							
						</div>
					</div>
				</div>
				<div class="container mt-5">
					<div class="row">
						<div class="col">
							<a href="create_pdf9.php?letter_id=<?php echo $letter_id ?>"  target="_blank"><button class="btn btn-primary mt-3">Export PDF</button></a>
							<button class="btn btn-primary mt-3" onclick="PrintDiv();">Print</button>
							<button class="btn btn-primary mt-3" data-toggle="modal" data-target="#noAnimModal">Upload Documents</button>
							<button class="btn btn-primary mt-3 smsbtn" onclick="sendMail();">Send Via Email</button>
							
						</div>
					</div>
				</div>
				<footer id="footer">
					<?php include '../footer.php'; ?>
				</footer>
			</div>
			<!-- Vendor -->
			<?php include '../footer_files.php'; ?>
			<!-- Theme Initialization Files -->
			<script src="js/upload.js"></script>
			<script src="js/print.js"></script>
			<script type="text/javascript">
			function sendMail() {
			var letter_id    = "<?php echo $letter_id; ?>";
			$.ajax({
			type: 'POST',
			url: 'send_mail9.php',
			data: {'send': "send", 'letter_id': letter_id},
			beforeSend: function(){
			$('.smsbtn').attr("disabled","disabled");
			},
			success: function(data){
			alert(data);
			}
			});
			}
			</script>
			
		</body>
	</html>