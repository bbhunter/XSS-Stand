<?php
include(__DIR__ . '/../header.php');
$blackListChars = [ "\n", "\r", "\\", "'", '"' ];
?>
<div class="d-inline-block">
    Hello, <a id="name">Anonymous</a>!
</div>
<script>
var name = "<?php
if  (isset($_POST['name']) && !empty($_POST['name']))
    echo str_replace($blackListChars, '', $_POST['name']);
else
    echo 'Anonymous';
?>";
$("#name").text(name);
</script>
<div class="container container-fluid">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <form  method="POST">
                <label class="sr-only" for="input_name">Your Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="name" id="input_name" placeholder="Username">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Hello!</button>
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
