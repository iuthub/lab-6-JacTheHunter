<?php

$pattern = "";
$text = "";
$replaceText = "";
$replacedText = "";


$match = "Not checked yet.";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pattern = $_POST["pattern"];
    $text = $_POST["text"];
    $replaceText = $_POST["replaceText"];


    $replacedText = preg_replace($pattern, $replaceText, $text);

    $word_pattern = preg_match('/' . $text . '/i', $text);
    $email_pattern = preg_match('/[a-z0-9.]*@[a-z.]*\.[a-z]{2,3}/', $text);
    $phone_pattern = preg_match('/(\+998-)[0-9]{2}(-[0-9]{7})/', $text);
    $white_space = preg_replace('/\s+/', '', $text);
    $numeric_pattern = preg_match('/\d|[,]|[.]/i', $text);
    $extract = preg_replace('/\s+/', ' ', trim($text));
    $ext_text = preg_match('/[(.*?)]/', $text, $replacedTexts);

    if (preg_match($pattern, $text)) {
        $match = "Match!";
    } else {
        $match = "Does not match!";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Valid Form</title>
</head>
<body>
<form action="regex_valid_form.php" method="post">
    <dl>
        <dt>Pattern</dt>
        <dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>

        <dt>Text</dt>
        <dd><input type="text" name="text" value="<?= $text ?>"></dd>

        <dt>Replace Text</dt>
        <dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

        <dt>Output Text</dt>
        <dd><?= $match ?></dd>

        <dt>Replaced Text</dt>
        <dd><code><?= $replacedText ?></code></dd>

        <dt>&nbsp;</dt>
        <dd><input type="submit" value="Check"></dd>
    </dl>

</form>
</body>
</html>
