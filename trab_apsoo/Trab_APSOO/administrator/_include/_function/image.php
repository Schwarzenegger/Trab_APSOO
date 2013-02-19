<?php

	function loadImage($image, $title=null,$width=null,$height=null)
	{
		$img = "<img src='_css/_images/".$image."' alt='".$title."' title='" .$title. "' width='" .$width. "' height='" .$height."' border='0' />";
		return $img;
	}

	function randomImage()
	{
		$imagens = array();

		$caminho = "_css/_images/_banners";
		$diretorio = opendir($caminho);
		while($nome_item = readdir($diretorio))
		{
			$list_item[] = $nome_item;
		}

		sort($list_item);
		foreach($list_item as $item)
		{
			//Tirando o diretorio pai e o proprio diretorio
			if( ($item != ".") && ($item != "..") )
			{
				if( !(is_dir($item)) )
				{
					$imagens[] = $item;
				}
			}	
		}

		$index = rand(1,count($imagens)-1);
                $banner = "/_banners/" . $imagens[$index];
		return loadImage($banner,"Ashford Castle",454,254);
	}


?>
