<?php
include(__DIR__ . '/../header.php');
?>
Hello, <?php
$name = 'Anonymous';
if (isset($_POST['name']) and !empty($_POST['name'])) {
    $name = $_POST['name'];
    raw_header("Set-Cookie: name=" . $name);
} elseif (isset($_COOKIE['name']) && !empty($_COOKIE['name']))
    $name = $_COOKIE['name'];
echo $name;
?>!
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
