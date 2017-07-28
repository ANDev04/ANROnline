<main>
    <form action="<?php echo base_url("ANROC_Auth/Auth/") ?>" method="post">
        <table>
            <tr>
                <td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login"></td>
			</tr>
            <?php echo $this->session->userdata('username');
            ?>
        </table>
    </form>
</main>