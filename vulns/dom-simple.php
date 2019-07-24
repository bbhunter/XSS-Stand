<?php
include(__DIR__ . '/../header.php');
?>
<script>
function voidChangeName(name) {
    $("#name").html(name);
    window.location.hash = name;
}
window.onload = function() {
    if (window.location.hash == "")
        return;
    voidChangeName(decodeURIComponent(window.location.hash.substr(1)));
}
</script>
<div class="d-inline-block">
    Hello, <a id="name">Anonymous</a>!
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
                        <button class="btn btn-outline-secondary" type="button" onclick="voidChangeName($('#input_text').val())">Say something!</button>
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
