<?php
require_once __DIR__ . '/vendor/autoload.php';

use MathPHP\Algebra;

$gcd = Algebra::gcd(8, 12);
?>
<!doctype html>
<html>
    <head>
        <title>Framework Verification</title>
        <meta charset="UTF-8">
        <script src="/js/node_modules/jquery/dist/jquery.min.js"></script>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/skeleton.css">
    </head>
    <body>
        <div class="container">
            <div class="section hero">
                <div class="container">
                    <div class="row">
                        <div>
                            <h1>Framework Verification</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="one-half column">
                            <input type="text" name="math" id="math" value="<?php echo $gcd; ?>">
                        </div>
                        <div class="one-half column phones">
                            <input type="text" name="jquery" id="jquery" value="1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $("#jquery").val("5");
        </script>
    </body>
</html>
