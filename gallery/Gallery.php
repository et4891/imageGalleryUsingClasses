<?php 
class Gallery {
	public $path;

	// default images directory
	public function __construct()
	{
		// set the $path variable to __DIR__ . '\images'
		$this->path = __DIR__ . '\images';
	}

	//custom images directory
	public function setPath($path)
	{
		// get ride of the last character of the path if the last character is /
		if (substr($path, -1) === '/')
		{
			$path = substr($path, 0, -1);
		}
		$this->path = $path;
	}

	private function getDirectory($path)
	{
		return scandir($path);
	}

	// sets default extensions to jpg, png
	public function getImages($extensions = array('jpg', 'png'))
	{
		$images = $this->getDirectory($this->path);

		foreach ($images as $index => $image)
		{
			// separate filename and file extension into array
			$extension = explode('.', $image);
			// choose the end of the array which is the extension of filename and lowercase it
			$extension = strtolower(end($extension));

			// if the extension aren't in the exntesions array unset the $images[$index]
			if (!in_array($extension, $extensions))
			{
				unset($images[$index]);
			}
			// reset $images[$index] into array with keys of full and thumb and its path
			else
			{
				$images[$index] = array(
						'full'	=> $this->path . '/' . $image,
						'thumb'	=> $this->path . '/thumbs/' . $image
					);
			}
		}

		// count if there are $images if true then return $images else return false
		return (count($images)) ? $images : false;
	}

}