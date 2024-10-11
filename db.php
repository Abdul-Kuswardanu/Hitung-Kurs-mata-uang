<?php
    $db = new SQLite3('database.db');
    if (!$db) {
         echo $db->lastErrorMsg();
    } else {
        // echo "Table created or already exists.";
    }
    

$db->query( "CREATE TABLE IF NOT EXISTS exchange_rates (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    currency TEXT NOT NULL,
    eRate_buy REAL NOT NULL,
    eRate_sell REAL NOT NULL,
    ttCounter_buy REAL NOT NULL,
    ttCounter_sell REAL NOT NULL,
    bankNotes_buy REAL NOT NULL,
    bankNotes_sell REAL NOT NULL
)");

$db->query( "INSERT INTO exchange_rates (currency, eRate_buy, eRate_sell, ttCounter_buy, ttCounter_sell, bankNotes_buy, bankNotes_sell)
VALUES
    ('USD', 15644.50, 15690.50, 15581.00, 15731.00, 15556.00, 15756.00),
    ('EUR', 17090.04, 17180.13, 17023.00, 17204.00, 16998.00, 17229.00),
    ('JPY', 104.16, 105.87, 103.25, 107.76, 103.00, 108.01),
    ('SGD', 11940.66, 12020.25, 11888.00, 12069.00, 11863.00, 12094.00),
    ('AUD', 10581.32, 10636.50, 10458.00, 10661.00, 10433.00, 10661.00),
    ('GBP', 20156.00, 20280.00, 20045.00, 20310.00, 20020.00, 20325.00),
    ('MYR', 3330.15, 3360.45, 3305.50, 3380.70, 3290.00, 3395.80)
");

