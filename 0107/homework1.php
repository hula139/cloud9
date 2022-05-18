<?php
$paid = [
    [
        'date' => '2022-01-01',
        'amount' => 10000,
    ],
    [
        'date' => '2022-01-08',
        'amount' => 1000,
    ],
    [
        'date' => '2022-01-15',
        'amount' => 2000,
    ],
    [
        'date' => '2022-01-22',
        'amount' => 1500,
    ],
    [
        'date' => '2022-01-29',
        'amount' => 1000,
    ]
];
?>
<table>
    <tr>
        <th>返済日</th>
        <th>金額</th>
    </tr>
    <?php foreach ($paid as $pay) { ?>
    <tr>
        <td><?php print($pay['date']); ?></td>
        <td><?php print($pay['amount']); ?></td>
    </tr>
    <?php } ?>
</table>