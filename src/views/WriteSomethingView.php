<?php

namespace cool_name_for_your_group\hw3\views;


require_once HW3ROOT."/src/views/View.php";
require_once HW3ROOT."/src/views/elements/elementHeader.php";
require_once HW3ROOT."/src/views/elements/elementFooter.php";
require_once HW3ROOT."/src/views/helpers/GenreSelector.php";
use cool_name_for_your_group\hw3\views\elements\elementHeader as htmlHeader;
use cool_name_for_your_group\hw3\views\elements\elementFooter as htmlFooter;
use cool_name_for_your_group\hw3\views\helpers\GenreSelector;

class WriteSomethingView extends View{
//    here $data contains
//    $data['Genres']
//
//
	function render($data){
	    $head = new htmlHeader($this);
		$data2['title'] = "Five Thousand Characters - Write Something";
		$head->render($data2);

//        $data['title']="";
//        $data['author']="";
//        $data['identifier']="";
//        $data['story']="";
		?>
		<h1 style="text-align: center">
			<a href="index.php?c=GodController&m=loadLandingPage">
			Five Thousand Characters</a> - Write Something
        </h1>

		<form method="post" action="index.php">
            <input type="hidden" name="c" value="GodController">
            <input type="hidden" name="m" value="processWriteSomething">
				<label for="title">Title</label> <br>
					<input type="text" id ="title" name ="title" value="<?=$data['title']?>"/>
					<br> <!--  -->
				<label for="author">Author</label> <br>
					<input type="text" id ="author" name="author" value="<?=$data['author']?>"/>
					<br>
				<label for="identifier">Identifier</label> <br>
					<input type="text" id ="identifier" name="identifier" value="<?=$data['identifier']?>"/>
					<br>
                <label for="Genre">Genre</label><br>
                <?php
                    $genreSelector = new GenreSelector();
                    $genreSelector->render($data);
                ?>
                <br>
                <label for="story">Story</label><br>
				<textarea id="story" name = "story" rows="5" cols="40"><?=$data['story']?></textarea> <br>

				<button type="reset">Reset</button>
				<button type="submit">Save</button>
			</form>
            <label><?=$data['Message'] ?></label>
			<?php

			$footer = new htmlFooter($this);
			$footer->render($this);
	}
}
		?>
