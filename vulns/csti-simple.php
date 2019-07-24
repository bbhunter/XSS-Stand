<?php
include(__DIR__ . '/../header.php');
?>
<div class="container container-fluid">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <h1 class="cover-heading">CSTI</h1>
            <p class="lead"><?=(isset($_REQUEST['name']) ? htmlspecialchars($_REQUEST['name']) : '')?></p>
            <form method=GET onsubmit="this.submit()">
                <div class="input-group mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Your name"
                        aria-label="Your name"
                    >
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Say Hello</button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular.js"></script>
