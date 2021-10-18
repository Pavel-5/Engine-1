<h3>Калькулятор</h3>
<form action="/calculator" method="post">
	<input type="text" name="arg1" value="<?= $calculator['arg1'] ?>">
	<select name="operation" id="">
		<option value="add" <?php if ($calculator['operation'] == 'add') echo 'selected'; ?>>+</option>
		<option value="sub" <?php if ($calculator['operation'] == 'sub') echo 'selected'; ?>>-</option>
		<option value="mult" <?php if ($calculator['operation'] == 'mult') echo 'selected'; ?>>*</option>
		<option value="div" <?php if ($calculator['operation'] == 'div') echo 'selected'; ?>>/</option>
	</select>
	<input type="text" name="arg2" value="<?= $calculator['arg2'] ?>">
	<input type="submit" value="=">
	<input type="text" name="result" value="<?= $calculator['result'] ?>" readonly>
</form><br>
<button id="add" onclick="handleClick('add')">+</button>
<button id="sub" onclick="handleClick('sub')">-</button>
<button id="mult" onclick="handleClick('mult')">*</button>
<button id="div" onclick="handleClick('div')">/</button>

<script>
	async function handleClick(operation) {
		let arg1 = document.querySelector("input[name=arg1]").value;
		let arg2 = document.querySelector("input[name=arg2]").value;

		let data = await fetchData(arg1, arg2, operation);

		document.querySelector("input[name=result]").value = String(data.result);
	}

	async function fetchData(arg1, arg2, operation) {
		const response = await fetch('/apiCalculator', {
			method: 'POST',
			headers: new Headers({
				'Content-Type': 'application/json'
			}),
			body: JSON.stringify({
				arg1: Number(arg1),
				arg2: Number(arg2),
				operation: operation
			}),
		});

		return await response.json();
	}
</script>