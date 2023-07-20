<ul id="socialLinks">
    <li><a title="Moj Github profil" href="https://github.com/Marko9827" target="_blank"><i class="fab fa-github"></i></a></li>
    <li><a title="Link ka mom Github respozitorijumu od ovog projekta!" href="https://github.com/Marko9827/zafaksOSOSOS" target="_blank">
            <i class="bi  bi-git "></i></a></li>
    <li><a target="_blank" title="Moj Linkedin profil" href="https://www.linkedin.com/in/marko-nikolic-49385a283/"><i class="bi bi-linkedin"></i></a></li>
    <?php if ($_GET['p'] !== "info") { ?>
        <li><a title="Info" href="./?p=info"><i class="bi bi-info-circle" href=""></i></a></li>
    <?php } ?>
    <li><a href="https://github.com/Marko9827/zafaksOSOSOS/issues"  target="_blank" title="Prijavi bug"><i class="bi bi-bug-fill"></i></a></li>
</ul>

<?php if ($_GET['p'] == "info") {
?>

    <style>
        #socialLinks {
            position: unset;
            bottom: unset;
        }
    </style>

<?php
}
?>