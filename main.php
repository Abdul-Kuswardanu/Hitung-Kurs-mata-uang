<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$db = new SQLite3('database.db');

// Fetch exchange rates
$rates = [];
$results = $db->query('SELECT * FROM exchange_rates');
while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    $rates[$row['currency']] = $row['eRate_buy'];
}
$rates['IDR'] = 1; // Add IDR with rate 1

// Handle form submission
$fromAmount = '';
$toAmount = '';
$fromCurrency = 'IDR';
$toCurrency = 'USD';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fromAmount = floatval($_POST['fromAmount']);
    $fromCurrency = $_POST['fromCurrency'];
    $toCurrency = $_POST['toCurrency'];

    if ($fromAmount > 0) {
        if ($fromCurrency === 'IDR') {
            $toAmount = $fromAmount / $rates[$toCurrency];
        } elseif ($toCurrency === 'IDR') {
            $toAmount = $fromAmount * $rates[$fromCurrency];
        } else {
            // Convert to IDR first, then to the target currency
            $toIDR = $fromAmount * $rates[$fromCurrency];
            $toAmount = $toIDR / $rates[$toCurrency];
        }
        $toAmount = number_format($toAmount, 4, '.', '');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Tukar Mata Uang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="header-container">
            <img src="" alt="" class="">
            <h1>Nilai Tukar Mata Uang Asing</h1>
        </div>
    </header>

    <div class="exchange-rate-container">
        <div class="date-info">
            <p>Tanggal: <?php echo date('d M Y'); ?></p>
            <p>Diperbarui: <?php echo date('H:i'); ?></p>
        </div>

        <div class="currency-calculator">
            <h3>Kalkulator Mata Uang Asing</h3>
            <form method="POST" action="">
                <select name="fromCurrency">
                    <?php foreach ($rates as $currency => $rate): ?>
                        <option value="<?php echo $currency; ?>" <?php echo $currency === $fromCurrency ? 'selected' : ''; ?>><?php echo $currency; ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="number" name="fromAmount" value="<?php echo $fromAmount; ?>" placeholder="Amount" step="0.01" required>
                <span>=</span>
                <select name="toCurrency">
                    <?php foreach ($rates as $currency => $rate): ?>
                        <option value="<?php echo $currency; ?>" <?php echo $currency === $toCurrency ? 'selected' : ''; ?>><?php echo $currency; ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="text" value="<?php echo $toAmount; ?>" placeholder="Converted Amount" readonly>
                <input type="submit" value="Convert">
            </form>
        </div>

        <table>
        <thead>
            <tr>
                <th>Mata Uang</th>
                <th>e-Rate (Beli/Jual)</th>
                <th>TT Counter (Beli/Jual)</th>
                <th>Bank Notes (Beli/Jual)</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $results = $db->query('SELECT * FROM exchange_rates');
            while ($row = $results->fetchArray(SQLITE3_ASSOC)):
            ?>
            <tr>
                <td><?php echo $row['currency'] ?></td>
                <td><?php echo $row['eRate_buy'] ?>/<?php echo $row['eRate_sell'] ?></td>
                <td><?php echo $row['ttCounter_buy'] ?>/<?php echo $row['ttCounter_sell'] ?></td>
                <td><?php echo $row['bankNotes_buy'] ?>/<?php echo $row['bankNotes_sell'] ?></td>
            </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>