<?php
if (isset($_GET['health']))
    exit('ok');

include(__DIR__ . '/functions.php');
include(__DIR__ . '/config.php');

header("X-XSS-Protection: 0");

session_name('CoolH4x0rSession');
session_start();

$path = basename((isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : $_SERVER['REQUEST_URI']));

if (isset($_GET['reset'])) {
    session_unset();
    $path = explode('?', $path)[0];
    $path = ltrim($path, '/\\');
    header('Location: /' . $path);
    exit;
}

$challangeId = str_replace('.php', '', basename($_SERVER['PHP_SELF']));
$hasChallangeInfo = isset($context[$challangeId]);
$hasSolve = isset($hasChallangeInfo, $context[$challangeId]['solve']);
ob_start();
?>
<!doctype html>
<html lang="en" ng-app>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>XSS Vulnerability Stand</title>
    <style>
        a,
        a:focus,
        a:hover {
            color: #fff !important;
        }

        .btn-outline-secondary {
            color: white !important;
        }

        .btn-secondary,
        .btn-secondary:hover,
        .btn-secondary:focus {
            color: #333 !important;
            text-shadow: none;
            background-color: #fff !important;
            border: .05rem solid #fff !important;
        }

        html,
        body {
            background-color: #333 !important;
        }

        body {
            min-height: 100vh;
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-pack: center;
            -webkit-box-pack: center;
            justify-content: center;
            color: #fff !important;
            text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
            box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
        }

        .cover-container {
            width: 80%;
            min-height: 100vh !important;
        }

        .masthead {
            margin-bottom: 2rem;
        }

        .masthead-brand {
            margin-bottom: 0;
        }

        .nav-masthead .nav-link {
            padding: .25rem 0;
            font-weight: 700;
            color: rgba(255, 255, 255, .5);
            background-color: transparent;
            border-bottom: .25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
            border-bottom-color: rgba(255, 255, 255, .25);
        }

        .nav-masthead .nav-link+.nav-link {
            margin-left: 1rem;
        }

        .nav-masthead .active {
            color: #fff;
            border-bottom-color: #fff;
        }

        @media (min-width: 48em) {
            .masthead-brand {
                float: left;
            }

            .nav-masthead {
                float: right;
            }
        }

        .cover {
            padding: 0 1.5rem;
        }

        .cover .btn-lg {
            padding: .75rem 1.25rem;
            font-weight: 700;
        }

        .mastfoot {
            color: rgba(255, 255, 255, .5);
        }

        div.editable {
            color: black;
            background: #e9ecef;
            padding: 5px;
            text-align: left;
            line-height: 1;
            text-shadow: none;
        }

        div.editable > p > a:link,
        div.editable > p > a:visited,
        div.editable > p > a:active {
            color: #007bff !important;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</head>

<body class="text-center">

    <div class="cover-container d-flex p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand"><?php
                if (isset($context[$challangeId], $context[$challangeId]['name']))
                    echo htmlspecialchars($context[$challangeId]['name']);
                else
                    echo 'Vulnerable stand';
                ?></h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link" href="/">Index</a>
                    <?=($hasChallangeInfo) ? '<a class="nav-link" href="/' . htmlspecialchars($path, ENT_QUOTES) . '?source">Get Source</a>' : ''?>
                    <?=($hasSolve) ? '<a class="nav-link" href="/' . htmlspecialchars($path, ENT_QUOTES) . '?solve">Solve</a>' : ''?>
                    <a class="nav-link" href="/<?=htmlspecialchars($path, ENT_QUOTES)?>?reset">Reset</a>
                </nav>
            </div>
        </header>
<?php
if (isset($_GET['source'])) {
    $file = file_get_contents(basename($_SERVER['PHP_SELF']));
    echo '<div class="editable">';
    highlight_string($file);
    echo '</div>';
    include(__DIR__ . '/footer.php');
    exit;
}
if (isset($_GET['solve'])) {
    echo '<div class="editable">';
    if ($hasSolve) {
        foreach ($context[$challangeId]['solve'] as $hint) {
            echo htmlspecialchars($hint) . "</br>";
        }
    } else {
        echo 'Solve not found :(';
    }
    echo '</div>';
    include(__DIR__ . '/footer.php');
    exit;
}
