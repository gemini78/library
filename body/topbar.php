<header>
    <div class="wrapper">
        <nav>
            <ul>
                <li class="<?php echo ($page=="home")? "active" : "" ?>"><a href="?page=home">home</a></li>
                <li class="<?php echo ($page=="add-book")? "active" : "" ?>"><a href="?page=add-book">add-book</a></li>
                <li class="<?php echo ($page=="list-writer")? "active" : "" ?>"><a href="?page=list-writer">list-writer</a></li>
                <li class="<?php echo ($page=="add-writer")? "active" : "" ?>"><a href="?page=add-writer">add-writer</a></li>
                <li class="<?php echo ($page=="test")? "active" : "" ?>"><a href="?page=test">test</a></li>
            </ul>
        </nav>
    </div>
</header>
<?php include('../body/flash.php');