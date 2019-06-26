<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <link href="<?php echo PROJECT_HTTP_ROOT . DIRECTORY_SEPARATOR; ?>core/css/style.min.css" rel="stylesheet" type="text/css">
        <title>MVC Advanced by prod3v3loper</title>
    </head>
    <body>
        <div id="wrap">
            <?php
            if (isset($data['templates'])) {
                // If templates loop it
                foreach ($data['templates'] as $template) {
                    // Create template file path
                    $file = PROJECT_DOCUMENT_ROOT . DIRECTORY_SEPARATOR . 'core/tpl' . DIRECTORY_SEPARATOR . $template . '.tpl.php';
                    // Check if exitst and load
                    if (file_exists($file)) {
                        require_once $file;
                    }
                }
            }
            ?>
        </div>
    </body>
</html>