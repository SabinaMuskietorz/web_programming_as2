<form action="adddish.php" method="POST">
				<label>Name</label>
				<input type="text" name="name" />

				<label>Description</label>
				<textarea name="description"></textarea>

				<label>Price</label>
				<input type="text" name="price" />


				<label>Category</label>

				<select name="categoryId">
				<?php
					$stmt = $pdo->prepare('SELECT * FROM category');
					$stmt->execute();

					foreach ($stmt as $row) {
						echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
					}

				?>

				</select>
				<label>Visibility</label>
				<select name="visibility">
				<option value="hidden">Hidden</option>
				<option value="shown">Shown</option>

				</select>

				<input type="submit" name="submit" value="Add" />

			</form>