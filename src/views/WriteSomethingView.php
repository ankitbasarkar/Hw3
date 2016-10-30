<?php

namespace cool_name_for_your_group\hw3\views;

require_once HW3ROOT."/src/views/View.php";
require_once HW3ROOT.'/src/views/elements/elementHeader.php' as htmlHeader;
require_once HW3ROOT.'/src/views/elements/elementFooter.php' as htmlFooter;

class WriteSomethingView extends View{
	function render($data){
		$head = new htmlHeader($this);
		$data['title'] = "Five Thousand Characters - Write Something";
		$head->render($data);

		?>
		<h1 style="text-align: center">
			<a href="index.php?c=GodController&m=loadLandingPage">
			Five Thousand Characters - Write Something </a>
		</h1>

		<form method="post" action="index.php?c=GodController&m=processForm">
			<form name="myform" method="get">
				<label for="title">Title</label> <br>
					<input type="text" id ="title" value="<?=$data['title']?>"></input>
					<span class="error"><?= $data['title-err']?></span><br> <!-- To display error -->
				<label for="author">Author</label> <br>
					<input type="text" id ="author" value="<?=$data['author']?>"></input>
					<span class="error"><?= $data['author-err']?></span><br>
				<label for="identifier" value="<?=$data['identifier']?>">Identifier</label> <br>
					<input type="text" id ="identifier"></input>
					<span class="error"><?= $data['identifier-err']?></span><br><br> <br>
				<textarea id="story" rows="5" cols="40"><?=$data['story']?></textarea> <br>

				<button>Reset</button>
				<button>Save</button>
			</form>
			<?php


			$footer = new htmlFooter();
			$footer->render($this);
	}
}
		?>
