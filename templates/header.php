<!-- header template for each page -->
<!-- <section>
            <ul class="nav-bar row px-0 g-0">
                <li class="col-3 px-0"><a href="?page=home">Home</a></li>
                <li class="col-3 px-0"><a href="?page=products">Products</a></li>
                <li class="col-3 px-0"><a href="?page=register">Register</a></li>
                <li class="col-3 px-0"><a href="?page=login">Login</a></li>
            </ul>

        </section> -->
<?php if ($_SESSION['role'] == 'director') : ?>


<?php elseif ($_SESSION['role'] == 'department_head') : ?>

<?php elseif ($_SESSION['role'] == 'department_head') : ?>


<? endif; ?>