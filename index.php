<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <style>
        <?php include 'style.css';
        ?>
    </style>
    <?php
    $showNav = false;
    ?>
</head>

<body>

    <header class="font-family header">
        <img class="company-logo" src="CompanyLogo.png">

        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>

            <ul id='nav' class="menu nav-menu">
                <li><a>ABOUT</a></li>
                <li><a>SERVICES</a></li>
                <li><a>INFO</a></li>
                <li><a>FAQ</a></li>
                <li><a>CONTACT</a></li>
            </ul>
    </header>

    <section class="section-below-header font-family">

        <article class="main-text-box">
            <h1>Mauris id tellus convallis, eleifend ipsum eget</h1>

            <h2>ELEIFEND IPSUM EGET, MAURIS TEMPUS LACUS</h2>

            <p>Lorem ipsum dolor sit amet, consectur asipiscing elit. Vivamus fermentum</p>
        </article>

    </section>

    <section class="middle-section font-family">

        <h2>LOREM IPSUM SIT AMET</h2>

        <p>Consectur asipiscing elit. Vivamus fermentum</p>

        <section class="row-of-squares">
            <figure class="gray-square grow"></figure>
            <figure class="gray-square grow"></figure>
            <figure class="gray-square grow"></figure>
        </section>

    </section>

    <footer class="font-family">

        <section id="duplicated-html-block" class="row-of-squares">
            <article class="grow">
                <figure class="gray-square"></figure>
                <h2>DONEC VITAE METUS</h2>
                <figcaption>Ut non erat enim. Pellentesque maximus sem eu libero portal</figcaption>
            </article>

            <article class="grow">
                <figure class="gray-square"></figure>
                <h2>LOREM IPSUM SIT AMET</h2>
                <figcaption>Duis sodales vitae ipsum non facilisis. Donec convallis diam</figcaption>
            </article>

            <article class="grow">
                <figure class="gray-square"></figure>
                <h2>MAURIS ID TELLUS</h2>
                <figcaption>Class aptent taciti sociosqu ad litora torquent per conubia</figcaption>
            </article>
        </section>

    </footer>

    <button onclick="showNewBlock()">Show new block</button>

    <form class="upload-form" action="upload.php" method="POST" enctype="multipart/form-data">
        Select file to upload:
        <input class="file-box" type="file" name="fileToUpload" id="fileToUpload">
        <br /><br />
        Enter your name here:
        <input class="input-box" type="text" name="personName" placeholder="Your name" id="personName">
        <br /><br />
        <button type="submit" name="submit">Upload file</button>
    </form>

</body>

</html>

<script type="text/javascript">
    var i = 0;
    var original = document.getElementById('duplicated-html-block');

    function showNewBlock() {
        var clone = original.cloneNode(true);
        clone.id = 'duplicated-html-block' + ++i;
        original.parentNode.appendChild(clone);
    }
</script>