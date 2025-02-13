<?php include '../header.php' ?>


<div class="row">
    <!-- <div class="col-2">
                <h2>Filters</h2>
            </div> -->
    <div class=" ms-3 col">
        <?php
        include 'fetchIssuedBooks.php';
        ?>
        <?php
        include 'fetchReturnedBooks.php';
        ?>
    </div>
</div>

</div>
</body>

</html>