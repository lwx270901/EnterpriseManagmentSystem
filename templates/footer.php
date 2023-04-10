<!-- footer template for each page -->

<?php if ($_SESSION['role'] == 'director') : ?>


<?php elseif ($_SESSION['role'] == 'department_head') : ?>

<?php elseif ($_SESSION['role'] == 'employee') : ?>

<?php else : ?>
<?php endif; ?>