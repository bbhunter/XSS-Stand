<?php
include(__DIR__ . '/../header.php');
function renderBB($text) {
    $text = strip_tags($text);
    $replaces = [
        '/\[img\](.*)\[\/img\]/i' => '<img src="$1">',
        '/\[b\](.*)\[\/b\]/i' => '<b>$1</b>',
        '/\[i\](.*)\[\/i\]/i' => '<i>$1</i>'
    ];
    foreach ($replaces as $re => $val) {
        $text = preg_replace($re, $val, $text);
    }
    return $text;
}
?>
<div class="jumbotron">
    <div class="editable">
        <?php
        $text = 'Anonymous';
        if (isset($_POST['text']) and !empty($_POST['text'])) {
            $text = $_POST['text'];
        }
        echo renderBB($text);
        ?>
    </div>
</div>
<div class="container container-fluid">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <form  method="POST">
                <label class="sr-only" for="input_name">Your Text</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="text" id="input_text" placeholder="Text">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Say something!</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
<?php
include(__DIR__ . '/../footer.php');
?>
