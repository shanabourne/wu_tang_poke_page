<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Friends Page</title>
	<style>
        * {
            font-family: arial, sans-serif;
        }
        table, td, th {
    border: 1px solid black;
    }

    th {
    background-color: black;
    color: white;
    }

    #your_pokes {
        border: 1px solid black;
        width: 300px;
    }
    </style>
</head>
<body>
	<h2>Welcome, <?= $user['alias'] ?> !      		<a href="/logins/log_off">Log Out</a></h2>
<!-- Your pokes -->
	<hr>
    <h3><?= $user['total_pokers'] ?> person/people poked you!</h3>
    <div id="your_pokes">
        <?php foreach($poke_info as $poker) { ?>
            <p><?= $poker['alias'] ?> poked you <?= $poker['poke_count'] ?> time(s).</p>
        <?php } ?>
    </div>
    <hr>
    <h3>People you may want to poke: </h3>
      	<table>
            <thead>
                <th>Name</th>
                <th>Alias</th>
                <th>Email Address</th>
                <th>Poke History</th>
                <th>Action</th>
            </thead>
            <tbody>
            	<?php foreach($all_others as $other) { ?>
                <tr>
                    <td><?= $other['name'] ?></td>
                    <td><?= $other['alias'] ?></td>
                    <td><?= $other['email'] ?></td>
                    <td><?= $other['total_pokes'] ?> pokes</td>
                    <td><form action="/poke/<?= $other['id']?>" method="post">
                        <input type="hidden" name="<?= $other['id']?>" value="<?= $other['id']?>">
                        <input type="submit" value="Poke">
                    </form></td>
                </tr>
    			<?php } ?>
            </tbody>
        </table>
    <hr>
</body>
</html>