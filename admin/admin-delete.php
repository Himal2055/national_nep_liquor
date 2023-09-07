<h1>Delete</h1>

<b><?php echo display_name($_GET['table'],$_GET['id']); ?></b>

<p>Are you sure you want to delete this <?php echo $_GET['table']; ?>? This is a permanent action and cannot be undone.</p>

<a class="dbutton" href="delete-row.php?<?php echo "table=".$_GET['table']."&id=".$_GET['id']; ?>">YES</a>
<a class="dbutton" href="admin-area.php?<?php echo "page=".$_GET['table'] ; ?>">NO</a>
