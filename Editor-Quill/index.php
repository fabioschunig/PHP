<!DOCTYPE html>
<html>

<head>
	<title>
		Editor test file
	</title>

	<!-- Include stylesheet -->
	<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
</head>


<body>

	<?php
	echo "Editor";
	?>

	<form action="editor.php" method="POST">
		<label for="description">Description:</label>
		<input type="text" name="description">

		<!-- Create the editor container -->
		<div id="editorimage">
			<p>Editor with image upload</p>
			<p><br /></p>
			<img src="quill.png" alt="Quill">
		</div>

		<button type="submit">OK</button>
	</form>

	<!-- Include the Quill library -->
	<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

	<!-- Initialize Quill editor -->
	<script>
		//add the toolbar options
		var myToolbar = [
			['bold', 'italic', 'underline', 'strike'],
			['blockquote', 'code-block'],

			[{
				'color': []
			}, {
				'background': []
			}],
			[{
				'font': []
			}],
			[{
				'align': []
			}],

			['clean'],
			['image'] //add image here
		];

		var quill = new Quill('#editorimage', {
			theme: 'snow',
			modules: {
				toolbar: {
					container: myToolbar,
					handlers: {
						image: imageHandler
					}
				}
			},
		});

		function imageHandler() {
			var range = this.quill.getSelection();
			var value = prompt('Copy paste the image url here');
			if (value) {
				this.quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
			}
		}
	</script>

</body>

</html>