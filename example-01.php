<?php

/**
 * Example data.
 */
$data = [
  ['user_id' => 1, 'name' => 'Leanne Graham', 'date' => '25/9/2019', 'approve' => true],
  ['user_id' => 2, 'name' => 'Clementine Bauch', 'date' => '25/9/2019', 'approve' => true],
  ['user_id' => 1, 'name' => 'Leanne Graham', 'date' => '28/9/2019', 'approve' => false],
  ['user_id' => 2, 'name' => 'Clementine Bauch', 'date' => '28/9/2019', 'approve' => true],
  ['user_id' => 1, 'name' => 'Leanne Graham', 'date' => '30/9/2019', 'approve' => false],
  ['user_id' => 2, 'name' => 'Clementine Bauch', 'date' => '30/9/2019', 'approve' => false],
  ['user_id' => 2, 'name' => 'Clementine Bauch', 'date' => '5/10/2019', 'approve' => false],
];

/**
 * For remembering which items are enable.
 */
$record_enabled = [];
foreach ($data as $index => $doc) {
  if (!$doc['approve']) {
    $user_id = $doc['user_id'];
    if (empty($record_enabled[$user_id])) {
      $record_enabled[$user_id] = $index;
    }
  }
}

?>
<table border="1" cellspacing="0" cellpadding="10">
  <thead>
    <tr>
      <th>#</th>
      <th>name</th>
      <th>date</th>
      <th>status</th>
      <th>action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $index => $item) : ?>
      <tr>
        <td><?php echo $index + 1; ?></td>
        <td><?php echo $item['name']; ?></td>
        <td><?php echo $item['date']; ?></td>
        <td><?php echo $item['approve'] ? 'approve' : 'waiting'; ?></td>
        <td>
          <?php
            $user_id = $item['user_id'];
            if ($record_enabled[$user_id] == $index) : ?>
            <button>detail</button>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
