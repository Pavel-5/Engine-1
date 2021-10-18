<?php

$models_files = array_splice(scandir(MODELS_DIR), 2);

foreach ($models_files as $file) {
	include MODELS_DIR . "/" . $file;
}
