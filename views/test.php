<?php

// Decode JSON
$data = App::getIndex('gita');

// Print table
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Adhyaya</th>';
echo '<th>Slokas</th>';
echo '<th>Name</th>';
echo '<th>Transliteration</th>';
echo '<th>Description</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($data as $adhyaya) {
    echo '<tr>';
    echo '<td>' . $adhyaya['adhyaya'] . '</td>';
    echo '<td>' . $adhyaya['slokas'] . '</td>';
    echo '<td>' . $adhyaya['name'] . '</td>';
    echo '<td>' . $adhyaya['transliteration'] . '</td>';
    echo '<td>' . $adhyaya['description'] . '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

?>
