// faça um programa que faça as quatro operações (soma, subtrair, multiplicar e dividir) de números, o usuário deverá escolher a operação. [if/else]

<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os números do usuário
    $numero1 = $_POST["numero1"];
    $numero2 = $_POST["numero2"];
    
    // Recebe a operação escolhida pelo usuário
    $operacao = $_POST["operacao"];
    
    // Inicializa a variável para armazenar o resultado
    $resultado = 0;
    
    // Executa a operação escolhida
    if ($operacao == "soma") {
        $resultado = $numero1 + $numero2;
    } elseif ($operacao == "subtracao") {
        $resultado = $numero1 - $numero2;
    } elseif ($operacao == "multiplicacao") {
        $resultado = $numero1 * $numero2;
    } elseif ($operacao == "divisao") {
        // Verifica se o divisor não é zero para evitar divisão por zero
        if ($numero2 != 0) {
            $resultado = $numero1 / $numero2;
        } else {
            echo "Erro: Divisão por zero!";
        }
    } else {
        echo "Operação inválida!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora PHP</title>
</head>
<body>
    <h1>Calculadora PHP</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="numero1">Número 1:</label>
        <input type="number" name="numero1" required>
        
        <label for="numero2">Número 2:</label>
        <input type="number" name="numero2" required>
        
        <label for="operacao">Operação:</label>
        <select name="operacao">
            <option value="soma">Soma</option>
            <option value="subtracao">Subtração</option>
            <option value="multiplicacao">Multiplicação</option>
            <option value="divisao">Divisão</option>
        </select>
        
        <input type="submit" value="Calcular">
    </form>
    
    <?php
    // Exibe o resultado se a variável $resultado estiver definida
    if (isset($resultado)) {
        echo "Resultado: $resultado";
    }
    ?>
</body>
</html>