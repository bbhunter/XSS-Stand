<?php
include(__DIR__ . '/../header.php');
?>
<div class="jumbotron">
        <div class="editable">
            <?php
            $text = 'Anonymous';
            if (isset($_POST['text']) and !empty($_POST['text'])) {
                $text = $_POST['text'];
            }
            include(__DIR__ . '/../functions/markdown-lib.php');
            $parsedown = new Parsedown();
            echo $parsedown->parse($text);
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
