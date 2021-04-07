<form action="editdish.php" method="POST">

				<input type="hidden" name="id" value="<?php echo $record['id']; ?>" />
				<label>Name</label>
				<input type="text" name="name" value="<?php echo $record['name']; ?>" />

				<label>Description</label>
				<textarea name="description"><?php echo $record['description']; ?></textarea>



				<label>Price</label>
				<input type="text" name="price" value="<?php echo $record['price']; ?>" />

				<label>Category</label>

				<select name="categoryId">
				<?php
					$stmt = $pdo->prepare('SELECT * FROM category');
					$stmt->execute();

					foreach ($stmt as $category) {
						if ($record['categoryId'] == $category['id']) {
							echo '<option selected="selected" value="' . $row['id'] . '">' . $category['name'] . '</option>';
						}
						else {
							echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
						}

					}

				?>

				</select>

				<input type="submit" name="submit" value="Save" />

			</form>