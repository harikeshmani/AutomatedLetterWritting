<?php
session_start();
include 'config.php';
if (!isset($_SESSION['id']) || $_SESSION['id'] == '') {
	header("Location: index.php");
die();
}
$user_id = $_GET['user_id'];
$dept_id = $_GET['dept_id'];
$to_id   = $_GET['to'];
$subject_id = $_GET['sub'];
$id = $_GET['template_id'];
$template_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_templates WHERE id = '$id' AND status = 'active'"));
$template_name = $template_data['name'];
$number_of_fields = $template_data['numbers'];

?>
<!DOCTYPE html>
<html class="boxed">
	<head>
		<?php include 'header.php'; ?>
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker.css">
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	</head>
	<body>
		<div class="body">
			<?php include 'menu.php'; ?>
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
								<h1>Template Name: <?php echo  $template_data['name']; ?></h1>
							</div>
						</div>
					</div>
				</section>
				<form action" method="post" id="letter_form">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="hidden" name="department" value="<?php echo $dept_id; ?>">
                <input type="hidden" name="subject" value="<?php echo $subject_id; ?>">
                <input type="hidden" name="sent_to" value="<?php echo $to_id; ?>">
                <input type="hidden" name="template_id" value="<?php echo $id; ?>">
				<div class="container">
					<div class="row">
						<div class="col">
							<?php for ($i=1; $i <= $number_of_fields; $i++) { ?>
							<div class="form-row">
								<div class="form-group col">
									<?php
									echo $i;
									$field = "field$i";
									echo ".";
									$input = "input$i";
									?>
									<label><?php echo $template_data[$field]; ?></label>
									<input type="hidden" name="question<?php echo $i; ?>" value="<?php echo $template_data[$field]; ?>">
									<?php if($template_data[$input] == 'date') { ?>
									<div class="form-row">
										<div class="form-group col-lg-6">
											<label>From</label>
											<input type="text" name="fromdate" class="form-control form-control-lg" id="datetimepicker1">
										</div>
										<div class="form-group col-lg-6">
											<label>To</label>
											<input type="text" name="enddate" class="form-control form-control-lg" id="datetimepicker2">
										</div>
									</div>
									<?php } else if($template_data[$input] == 'dob') { ?>
                                       <div class="form-row">
										<div class="form-group">
											<input type="text" name="answer<?php echo $i; ?>" class="form-control form-control-lg" id="datetimepicker3">
										</div>
                                        </div>
									<?php } else { ?>
									<div class="row mb-2">
										<div class="col">
										<input type="text" class="form-control form-control-lg" name="answer<?php echo $i; ?>" id="note-textarea<?php echo $i; ?>">
											<h4 class="textContent<?php echo $i; ?>"></h4>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<h5 id="recording-instructions<?php echo $i; ?>"></h5>
										</div>
									</div>
									<div class="row text-center pb-3">
										<div class="col">
											<img src="img/letter icon-84.png" height="42" width="42" id="start-record-btn<?php echo $i; ?>"  />
											<img src="img/letter icon-85.png" height="42" width="42" id="pause-record-btn<?php echo $i; ?>" />
											<img src="img/letter icon-86.png" height="42" width="42" id="save-note-btn<?php echo $i; ?>" />
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
			
				<div class="row float-right">

						<button type="button" class="btn btn-rounded btn-xl btn-primary mb-2" onclick="uploadData();">Submit</button>

				</div>
			</div>
		</form>
		</div>
		<footer id="footer">
			<?php include 'footer.php'; ?>
		</footer>
	</div>
	<!-- Vendor -->
	<?php include 'footer_files.php'; ?>
	<!-- Theme Initialization Files -->
	<script type="text/javascript" src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="js/script.js"></script>
	<script type="text/javascript">
	$(function () {

// If you modify this array, also update default language / dialect below.
var langs =
[['Afrikaans',       ['af-ZA']],
 ['አማርኛ',           ['am-ET']],
 ['Azərbaycanca',    ['az-AZ']],
 ['বাংলা',            ['bn-BD', 'বাংলাদেশ'],
                     ['bn-IN', 'ভারত']],
 ['Bahasa Indonesia',['id-ID']],
 ['Bahasa Melayu',   ['ms-MY']],
 ['Català',          ['ca-ES']],
 ['Čeština',         ['cs-CZ']],
 ['Dansk',           ['da-DK']],
 ['Deutsch',         ['de-DE']],
 ['English',         ['en-AU', 'Australia'],
                     ['en-CA', 'Canada'],
                     ['en-IN', 'India'],
                     ['en-KE', 'Kenya'],
                     ['en-TZ', 'Tanzania'],
                     ['en-GH', 'Ghana'],
                     ['en-NZ', 'New Zealand'],
                     ['en-NG', 'Nigeria'],
                     ['en-ZA', 'South Africa'],
                     ['en-PH', 'Philippines'],
                     ['en-GB', 'United Kingdom'],
                     ['en-US', 'United States']],
 ['Español',         ['es-AR', 'Argentina'],
                     ['es-BO', 'Bolivia'],
                     ['es-CL', 'Chile'],
                     ['es-CO', 'Colombia'],
                     ['es-CR', 'Costa Rica'],
                     ['es-EC', 'Ecuador'],
                     ['es-SV', 'El Salvador'],
                     ['es-ES', 'España'],
                     ['es-US', 'Estados Unidos'],
                     ['es-GT', 'Guatemala'],
                     ['es-HN', 'Honduras'],
                     ['es-MX', 'México'],
                     ['es-NI', 'Nicaragua'],
                     ['es-PA', 'Panamá'],
                     ['es-PY', 'Paraguay'],
                     ['es-PE', 'Perú'],
                     ['es-PR', 'Puerto Rico'],
                     ['es-DO', 'República Dominicana'],
                     ['es-UY', 'Uruguay'],
                     ['es-VE', 'Venezuela']],
 ['Euskara',         ['eu-ES']],
 ['Filipino',        ['fil-PH']],
 ['Français',        ['fr-FR']],
 ['Basa Jawa',       ['jv-ID']],
 ['Galego',          ['gl-ES']],
 ['ગુજરાતી',           ['gu-IN']],
 ['Hrvatski',        ['hr-HR']],
 ['IsiZulu',         ['zu-ZA']],
 ['Íslenska',        ['is-IS']],
 ['Italiano',        ['it-IT', 'Italia'],
                     ['it-CH', 'Svizzera']],
 ['ಕನ್ನಡ',             ['kn-IN']],
 ['ភាសាខ្មែរ',          ['km-KH']],
 ['Latviešu',        ['lv-LV']],
 ['Lietuvių',        ['lt-LT']],
 ['മലയാളം',          ['ml-IN']],
 ['मराठी',             ['mr-IN']],
 ['Magyar',          ['hu-HU']],
 ['ລາວ',              ['lo-LA']],
 ['Nederlands',      ['nl-NL']],
 ['नेपाली भाषा',        ['ne-NP']],
 ['Norsk bokmål',    ['nb-NO']],
 ['Polski',          ['pl-PL']],
 ['Português',       ['pt-BR', 'Brasil'],
                     ['pt-PT', 'Portugal']],
 ['Română',          ['ro-RO']],
 ['සිංහල',          ['si-LK']],
 ['Slovenščina',     ['sl-SI']],
 ['Basa Sunda',      ['su-ID']],
 ['Slovenčina',      ['sk-SK']],
 ['Suomi',           ['fi-FI']],
 ['Svenska',         ['sv-SE']],
 ['Kiswahili',       ['sw-TZ', 'Tanzania'],
                     ['sw-KE', 'Kenya']],
 ['ქართული',       ['ka-GE']],
 ['Հայերեն',          ['hy-AM']],
 ['தமிழ்',            ['ta-IN', 'இந்தியா'],
                     ['ta-SG', 'சிங்கப்பூர்'],
                     ['ta-LK', 'இலங்கை'],
                     ['ta-MY', 'மலேசியா']],
 ['తెలుగు',           ['te-IN']],
 ['Tiếng Việt',      ['vi-VN']],
 ['Türkçe',          ['tr-TR']],
 ['اُردُو',            ['ur-PK', 'پاکستان'],
                     ['ur-IN', 'بھارت']],
 ['Ελληνικά',         ['el-GR']],
 ['български',         ['bg-BG']],
 ['Pусский',          ['ru-RU']],
 ['Српски',           ['sr-RS']],
 ['Українська',        ['uk-UA']],
 ['한국어',            ['ko-KR']],
 ['中文',             ['cmn-Hans-CN', '普通话 (中国大陆)'],
                     ['cmn-Hans-HK', '普通话 (香港)'],
                     ['cmn-Hant-TW', '中文 (台灣)'],
                     ['yue-Hant-HK', '粵語 (香港)']],
 ['日本語',           ['ja-JP']],
 ['हिन्दी',             ['hi-IN']],
 ['ภาษาไทย',         ['th-TH']]];

for (var i = 0; i < langs.length; i++) {
  select_language.options[i] = new Option(langs[i][0], i);
}
// Set default language / dialect.
select_language.selectedIndex = 58;	
	$('#datetimepicker1, #datetimepicker2,  #datetimepicker3').datepicker();
	});
	function uploadData() {
		var getall = $('#letter_form').serialize();
		var template_id = "<?php echo $id; ?>"
        $.ajax({
        url: 'php/add_qa.php',
        type: 'POST',
        data: getall,
        success: function (data) {
        	//console.log(data);
            window.location.replace('Templates/template'+template_id+'.php?letter_id='+data+'');
        }

    });
	}
	</script>
	
</body>
</html>