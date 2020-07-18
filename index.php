<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="author" content="Guillermo Valles Godoy" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="http://jqueryrut.sourceforge.net/jquery.Rut.js"></script>
		<title>Visor-PDF</title>
		<style>
		  #btn {position:absolute; right:25px}
		  #btn {position:absolute; top:6px}
		</style>
	</head>
	<body>
		<div class="top-bar">
			<button id="btn" class="btn" onclick="GETPDF();"><i class="fas fa-search"></i>PDF</button>
			<span class="page-info">
			<span hidden="hidden" id="page-num"></span> <span hidden="hidden" id="page-count"></span>
			</span>
		</div>

		<div align="center">
			<canvas id="pdf_renderer"></canvas>
		</div>

		<script>
			function GETPDF(){
				pdfjsLib.getDocument('pdf/nombre_pdf.pdf').then(doc => {
					doc.getPage(1).then(page => {
						var canvas = document.getElementById("pdf_renderer");
						var ctx = canvas.getContext('2d');
						var viewport = page.getViewport(1);

						canvas.width = viewport.width;
						canvas.height = viewport.height;

						page.render({
							canvasContext: ctx,
							viewport: viewport
						});
					});
				});
				document.getElementById("pdf_renderer").style.display="block";
			}
		</script>
	</body>
</html>
