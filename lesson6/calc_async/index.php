<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Калькулятор</title>
</head>
<body>
<form method="get" id="form">
    <input type="text" name="num1">
    <select name="operator">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="num2">
    <button class="btn" type="submit">=</button>
    <input type="text" name="res">
</form>
<script>
    const form = document.getElementById('form');

    document.querySelector('.btn').addEventListener('click', async (e) => {
        e.preventDefault()
        const num1 = form.querySelector('[name="num1"]').value
        const operator = form.querySelector('[name="operator"]').value
        const num2 = form.querySelector('[name="num2"]').value

        const feth = await fetch('./calc.php',{
            method: 'POST',
            headers: {
                'Content-Type': 'application/text'
            },
            body: JSON.stringify({
                'num1': num1,
                'operator': operator,
                'num2': num2
            })
        })
        const answer = await feth.text()

        form.querySelector('[name="res"]').value = answer

    })

</script>
</body>
</html>