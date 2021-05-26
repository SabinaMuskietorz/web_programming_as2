<?php
function loadTemplate($fileName, $templateVars) {
    extract($templateVars);
    //start the buffer
    ob_start();
    require $fileName;
    //read the buffer
    $contents = ob_get_clean();
    return $contents;
}
?>