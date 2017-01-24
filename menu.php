<?php if (!isset($_SESSION[ 'role'])) { die(); } ?>

<div id="bar-menu" class="bar" style="margin-bottom:1em;">
    <div class="bar-inner">
        <ul>
            <li style="margin-top:5px;">
                <a href="main.php">
                    <span class="semi-bold">Home</span>
                </a>
            </li>
            <li style="margin-top:5px;">
                <a href="workers-list.php">
                    <span class="semi-bold">Workers</span>
                </a>
            </li>
            <li style="margin-top:5px;">
                <a href="sites-list.php">
                    <span class="semi-bold">Sites</span>
                </a>
            </li>
        </ul>
    </div>
</div>
